<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoClasificacionFormRequest;
use App\Models\TipoClasificacion;
use App\Utils\Utils;

class TipoClasificacionController extends Controller
{
    public function index(){
        return view('vistas.tipos.index',
            [
                'tipos' => TipoClasificacion::all()
            ]);
    }

    public function create(){
        return view('vistas.tipos.create');
    }

    public function store(TipoClasificacionFormRequest $request)
    {
        $tipo = new TipoClasificacion();
        $tipo->nombre = $request['nombre'];
        if ($tipo->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('tipos')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {
        return view('vistas.tipos.edit',
            [
                'tipo' => TipoClasificacion::findOrFail($id),
            ]);
    }

    public function update(TipoClasificacionFormRequest $request, $id)
    {
        $tipo = TipoClasificacion::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        if ($tipo->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('tipos')->with(['message' => $mensaje]);
    }

    public function destroy($id)
    {
        $tipo = TipoClasificacion::findOrFail($id);
        if ($tipo->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('tipos')->with(['message' => $mensaje]);
    }
}
