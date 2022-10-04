<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipoFormRequest;
use App\Models\Equipo;
use App\Models\MarcaClasificacion;
use App\Models\TipoClasificacion;
use App\Utils\Utils;
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
    public function guardarEquipo(EquipoFormRequest $request){
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
            QRCode::text($datos)->setSize(8)->setOutfile($direccion)->png();
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('imonitoreo/editarSucursal/'.$request['sucursal_id'])->with(['message' => $mensaje]);
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
    public function actualizarEquipo(EquipoFormRequest $request, $id){

        $equipo = Equipo::findOrFail($id);
        $equipo->nro_serie = $request['nro_serie'];
        $equipo->descripcion = $request['descripcion'];
        $equipo->ubicacion = $request['ubicacion'];
        $equipo->unidad_medida = $request['unidad_medida'];
        $equipo->ano_fabricacion = $request['ano_fabricacion'];
        $equipo->capacidad = $request['capacidad'];
        $equipo->tipo_clasificacion_id = $request['tipo_clasificacion_id'];
        $equipo->marca_clasificacion_id = $request['marca_clasificacion_id'];
        if ($equipo->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('imonitoreo/editarSucursal/'.$equipo->sucursal_id)->with(['message' => $mensaje]);
    }

    public function eliminarEquipo($id){

        $equipo = Equipo::findOrFail($id);
        $sucursal_id = $equipo->sucursal_id;
        if ($equipo->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect(('imonitoreo/editarSucursal/'.$sucursal_id))->with(['message' => $mensaje]);

    }

}
