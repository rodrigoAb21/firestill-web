<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContratoFormRequest;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Trabajador;
use App\Utils\Utils;

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

    public function guardarContrato(ContratoFormRequest $request){

        $contrato = new Contrato();
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->estado = "Vigente";
        $contrato->edicion = true;
        $contrato->periodo = $request['periodo'];
/*        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }else{
            $contrato->documento = 'default.png';
        }*/
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->trabajador_id = $request['trabajador_id'];
        if ($contrato->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('imonitoreo/listaContratos')->with(['message' => $mensaje]);
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

    public function actualizarContrato(ContratoFormRequest $request, $id){

        $contrato = Contrato::findOrFail($id);
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->periodo = $request['periodo'];
/*        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }*/
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->trabajador_id = $request['trabajador_id'];

        if ($contrato->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('imonitoreo/editarContrato/'.$id)->with(['message' => $mensaje]);
    }

    public function eliminarContrato($id){
        $contrato = Contrato::findOrFail($id);
        if ($contrato->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('imonitoreo/listaContratos')->with(['message' => $mensaje]);
    }

    public function finalizarEdicion($id){
        $contrato = Contrato::findOrFail($id);
        $contrato->edicion = false;
        if ($contrato->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('imonitoreo/listaContratos')->with(['message' => $mensaje]);
    }
}
