<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\MarcaClasificacion;
use App\Models\TipoClasificacion;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;

class EquipoController extends Controller
{

    public function nuevoEquipo($sucursal_id){
        return view('vistas.imonitoreo.nuevoEquipo',[
            'sucursal_id' => $sucursal_id,
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function guardarEquipo(Request $request){
        $this->validate($request, [
            'nro_serie' => 'required|numeric',
            'descripcion' => 'nullable|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'unidad_medida' => 'required|string|max:255',
            'ano_fabricacion' => 'required|numeric|digits:4',
            'capacidad' => 'required|numeric|min:1',
            'sucursal_id' => 'required|numeric|min:1',
            'tipo_clasificacion_id' => 'required|numeric|min:1',
            'marca_clasificacion_id' => 'required|numeric|min:1',
        ]);

        $equipo = new Equipo();
        $equipo->nro_serie = $request['nro_serie'];
        $equipo->descripcion = $request['descripcion'];
        $equipo->ubicacion = $request['ubicacion'];
        $equipo->unidad_medida = $request['unidad_medida'];
        $equipo->ano_fabricacion = $request['ano_fabricacion'];
        $equipo->capacidad = $request['capacidad'];
        $equipo->presion_min = 60;
        $equipo->presion_max = 100;
        $equipo->sucursal_id = $request['sucursal_id'];
        $equipo->tipo_clasificacion_id = $request['tipo_clasificacion_id'];
        $equipo->marca_clasificacion_id = $request['marca_clasificacion_id'];
        if ($equipo->save()){
            $direccion = public_path('img/equipos/codigos/'.$equipo->id.'.png');
            $datos = $equipo->id;
            QRCode::text($datos)->setSize(10)->setOutfile($direccion)->png();
        }

        return redirect('imonitoreo/editarSucursal/'.$request['sucursal_id']);
    }
    public function verEquipo($id){
        return view('vistas.imonitoreo.verEquipo',[
            'equipo' => Equipo::findOrFail($id),
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function editarEquipo($id){
        return view('vistas.imonitoreo.editarEquipo',[
            'equipo' => Equipo::findOrFail($id),
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function actualizarEquipo(Request $request, $id){
        $this->validate($request, [
            'nro_serie' => 'required|numeric',
            'descripcion' => 'nullable|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'unidad_medida' => 'required|string|max:255',
            'ano_fabricacion' => 'required|numeric|digits:4',
            'capacidad' => 'required|numeric|min:1',
            'tipo_clasificacion_id' => 'required|numeric|min:1',
            'marca_clasificacion_id' => 'required|numeric|min:1',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->nro_serie = $request['nro_serie'];
        $equipo->descripcion = $request['descripcion'];
        $equipo->ubicacion = $request['ubicacion'];
        $equipo->unidad_medida = $request['unidad_medida'];
        $equipo->ano_fabricacion = $request['ano_fabricacion'];
        $equipo->capacidad = $request['capacidad'];
        $equipo->tipo_clasificacion_id = $request['tipo_clasificacion_id'];
        $equipo->marca_clasificacion_id = $request['marca_clasificacion_id'];
        $equipo->save();

        return redirect('imonitoreo/editarSucursal/'.$equipo->sucursal_id);
    }

    public function eliminarEquipo($id){

        $equipo = Equipo::findOrFail($id);
        $sucursal_id = $equipo->sucursal_id;
        $equipo->delete();

        return redirect(('imonitoreo/editarSucursal/'.$sucursal_id));

    }

}
