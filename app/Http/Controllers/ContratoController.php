<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function listaContratos(){
        $this->actualizarEstados();
        return view('vistas.imonitoreo.listaContratos', [
            'contratos' => Contrato::all()
        ]);
    }

    public function actualizarEstados(){
        $hoy = date('Y-m-d');
        $contratos = Contrato::
        where('estado','=', 'Vigente')
            ->where('fecha_fin', '<', $hoy)
            ->get();
        foreach ($contratos as $contrato){
            $contrato->estado = 'Finalizado';
            $contrato->update();
        }
    }

    public function nuevoContrato(){
        return view('vistas.imonitoreo.nuevoContrato',[
            'clientes' => Cliente::all(),
            'trabajadores' => Trabajador::all(),
        ]);
    }

    public function guardarContrato(Request $request){
        $this->validate($request, [
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'periodo' => 'required|numeric|min:1',
            'cliente_id' => 'required|numeric|min:1',
            'trabajador_id' => 'required|numeric|min:1',
            'documento' => 'nullable|file|mimes:doc,docx,pdf,txt',
        ]);

        $contrato = new Contrato();
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->estado = "Vigente";
        $contrato->edicion = true;
        $contrato->periodo = $request['periodo'];
        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }else{
            $contrato->documento = 'default.png';
        }
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->trabajador_id = $request['trabajador_id'];
        $contrato->save();

        return redirect('imonitoreo/listaContratos');
    }

    public function verContrato($id){
        return view('vistas.imonitoreo.verContrato',[
            'contrato' => Contrato::findOrFail($id),
            'clientes' => Cliente::all(),
            'trabajadores' => Trabajador::all(),
        ]);
    }

    public function editarContrato($id){
        return view('vistas.imonitoreo.editarContrato',[
            'contrato' => Contrato::findOrFail($id),
            'clientes' => Cliente::all(),
            'trabajadores' => Trabajador::all(),
        ]);
    }

    public function actualizarContrato(Request $request, $id){
        $this->validate($request, [
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'periodo' => 'required|numeric|min:1',
            'cliente_id' => 'required|numeric|min:1',
            'trabajador_id' => 'required|numeric|min:1',
            'documento' => 'nullable|file|mimes:doc,docx,pdf,txt',
        ]);

        $contrato = Contrato::findOrFail($id);
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->periodo = $request['periodo'];
        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->trabajador_id = $request['trabajador_id'];
        $contrato->update();

        return redirect('imonitoreo/editarContrato/'.$id);
    }

    public function eliminarContrato($id){
        $contrato = Contrato::findOrFail($id);
        $contrato->delete();

        return redirect('imonitoreo/listaContratos');
    }

    public function finalizarEdicion($id){
        $contrato = Contrato::findOrFail($id);
        $contrato->edicion = false;
        $contrato->update();

        return redirect('imonitoreo/listaContratos');
    }
}
