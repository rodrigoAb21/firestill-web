<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
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
        $sucursal->save();

        return redirect('imonitoreo/editarContrato/'.$request['contrato_id']);
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
        $sucursal->update();

        return redirect('imonitoreo/editarSucursal/'.$id);
    }

    public function eliminarSucursal($id){
        $sucursal = Sucursal::findOrFail($id);
        $contrato_id = $sucursal->contrato_id;
        $sucursal->delete();

        return redirect(('imonitoreo/editarContrato/'.$contrato_id));
    }
}
