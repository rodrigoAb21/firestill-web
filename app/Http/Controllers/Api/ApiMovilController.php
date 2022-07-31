<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\FichaTecnica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiMovilController extends Controller
{
    public function listarClientesM(){
        $clientes = DB::table('cliente')
            ->join('contrato', 'cliente.id', 'contrato.cliente_id')
            ->where('contrato.fecha_fin', '>=', date('Y-m-d'))
            ->select('cliente.id', 'cliente.nombre_empresa')
            ->groupBy('cliente.id')
            ->get();

        return response()->json($clientes,200);
    }

    public function listarSucursalesM($id){
        $sucursales = DB::table('sucursal')
            ->join('contrato','sucursal.contrato_id','contrato.id')
            ->where('contrato.cliente_id','=',$id)
            ->where('contrato.fecha_fin','>=',date('Y-m-d'))
            ->select('sucursal.id', 'sucursal.nombre', 'sucursal.direccion')
            ->get();

        return response()->json($sucursales,200);
    }

    public function listarEquiposM($id){
        $equipos = DB::table('equipo')->where('equipo.sucursal_id','=',$id)->get();

        return response()->json($equipos,200);
    }

    public function detalleEquipoM($id){
        $detalleEquipo= DB::table('equipo')
            ->join('tipo_clasificacion','tipo_clasificacion.id','equipo.tipo_clasificacion_id')
            ->join('marca_clasificacion','marca_clasificacion.id','equipo.marca_clasificacion_id')
            ->where('equipo.id','=',$id)
            ->get();

        return response()->json($detalleEquipo,200);
    }

    public function actualizarGPSM(Request $request,$id){
        $equipo= Equipo::findOrFail($id);

        $equipo->ubicacion= $request->ubicacion;
        $equipo->longitud_ideal= $request->longitud_ideal;
        $equipo->latitud_ideal= $request->latitud_ideal;
        $equipo->update();

        return response()->json(['actualizarGPS' => 'OK'], 200);

    }

    public function guardarFichaTecnicaM(Request $request, $id){
        $fichaTecnica = new FichaTecnica();
        $fichaTecnica->equipo_id=$id;
        $fichaTecnica->fecha= date('Y-m-d');
        $fichaTecnica->eCanioPesca= $request->eCanioPesca;
        $fichaTecnica->eZuncho= $request->eZuncho;
        $fichaTecnica->eChasis= $request->eChasis;
        $fichaTecnica->eRueda= $request->eRueda;
        $fichaTecnica->eRosca= $request->eRosca;
        $fichaTecnica->eManguera= $request->eManguera;
        $fichaTecnica->eValvula= $request->eValvula;
        $fichaTecnica->eTobera= $request->eTobera;
        $fichaTecnica->eRobinete= $request->eRobinete;
        $fichaTecnica->ePalanca= $request->ePalanca;
        $fichaTecnica->eManometro= $request->eManometro;
        $fichaTecnica->eVastago= $request->eVastago;
        $fichaTecnica->eDifusor= $request->eDifusor;
        $fichaTecnica->eDisco= $request->eDisco;
        $fichaTecnica->carga= $request->carga;
        $fichaTecnica->observacion= $request->observacion;
        $fichaTecnica->resultado= $request->resultado;
        $fichaTecnica->empleado_id= Auth::user()->id;
        $fichaTecnica->save();


        return response()->json(['guardarFichaTécnica' => 'OK'], 200);
    }


}
