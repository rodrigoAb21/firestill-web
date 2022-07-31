<?php

namespace App\Http\Controllers\Api;


use App\Events\AlertaEvent;
use App\Events\ArduinoEvent;
use App\Models\Alerta;
use App\Models\Cliente;
use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function getUsuario(){
        return Auth::user();
    }

    public function getClientes(){
        $id = Auth::user()->id;
        $clientes = Cliente::all();
        return $clientes;
    }

    public function actualizarEquipo(Request $request, $id){
        if ($request['presion']!=null && $request['latitud']!=null && $request['longitud']!=null){
            $equipo = Equipo::findOrFail($id);
            $equipo->latitud_actual = $request['latitud'];
            $equipo->longitud_actual = $request['longitud'];
            $equipo->presion_actual = 80;
            $equipo->update();
            event(new ArduinoEvent($equipo));
/*
            if($equipo->presion_actual > $equipo->presion_max){
                $this->generarAlerta($id, "¡Presión muy alta! Extintor: ");
            }elseif($equipo->presion_actual < $equipo->presion_min){
                $this->generarAlerta($id,"¡Presión muy baja! Extintor: ");
            }
            if ($this->verificarGPS($equipo->latitud_ideal,$equipo->longitud_ideal,
                $equipo->latitud_actual, $equipo->longitud_actual)){
                $this->generarAlerta($id,"¡Extintor fuera de rango! Extintor: ");
            }
*/
            return response()->json(['mensaje' => 'POST---->OK'], 200);
        }else{
            return response()->json(['mensaje' => 'NUUULO'], 401);
        }

    }

    public function verificarGPS($lat_ideal, $lng_ideal, $lat_actual, $lng_actual){
        $distacncia = rad2deg(acos((sin(deg2rad($lat_ideal))
                *sin(deg2rad($lat_actual))) + (cos(deg2rad($lat_ideal))
                *cos(deg2rad($lat_actual))
                *cos(deg2rad($lng_ideal-($lng_actual))))));
        $distacncia = $distacncia * 111.13384 * 1000;
        return $distacncia > 10;
    }

    public function generarAlerta($equipo_id, $mensaje){
        $alerta = new Alerta();
        $alerta->fecha = date('Y-m-d H:i:s');
        $alerta->descripcion = $mensaje.$equipo_id;
        $alerta->equipo_id = $equipo_id;
        $alerta->save();
        event(new AlertaEvent("XXX"));
    }
}
