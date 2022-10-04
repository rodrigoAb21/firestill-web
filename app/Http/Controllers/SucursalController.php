<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Utils\Utils;
use Illuminate\Http\Request;

class SucursalController extends Controller
{

    public function guardarSucursal(Request $request){
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'contrato_id' => 'required|numeric|min:1',
        ]);

        $sucursal = new Sucursal();
        $sucursal->nombre = $request['nombre'];
        $sucursal->direccion = $request['direccion'];
        $sucursal->contrato_id = $request['contrato_id'];
        if ($sucursal->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('imonitoreo/editarContrato/'.$request['contrato_id'])->with(['message' => $mensaje]);
    }

    public function verSucursal($id){
        return view('vistas.imonitoreo.verSucursal',[
            'sucursal' => Sucursal::findOrFail($id),
        ]);
    }

    public function editarSucursal($id){
        return view('vistas.imonitoreo.editarSucursal',[
            'sucursal' => Sucursal::findOrFail($id),
        ]);
    }

    public function actualizarSucursal(Request $request, $id){
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $request['nombre'];
        $sucursal->direccion = $request['direccion'];
        if ($sucursal->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('imonitoreo/editarSucursal/'.$id)->with(['message' => $mensaje]);
    }

    public function eliminarSucursal($id){
        $sucursal = Sucursal::findOrFail($id);
        $contrato_id = $sucursal->contrato_id;
        if ($sucursal->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect(('imonitoreo/editarContrato/'.$contrato_id))->with(['message' => $mensaje]);
    }
}
