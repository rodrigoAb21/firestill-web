<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaClasificacionFormRequest;
use App\Models\MarcaClasificacion;
use App\Utils\Utils;
use Illuminate\Http\Request;

class MarcaClasificacionController extends Controller
{

    public function index(){
        return view('vistas.marcas.index',
            [
                'marcas' => MarcaClasificacion::all()
            ]);
    }

    public function create(){
        return view('vistas.marcas.create');
    }

    public function store(MarcaClasificacionFormRequest $request)
    {

        $marca = new MarcaClasificacion();
        $marca->nombre = $request['nombre'];
        if ($marca->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('marcas')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {
        return view('vistas.marcas.edit',
            [
                'marca' => MarcaClasificacion::findOrFail($id),
            ]);
    }

    public function update(Request $request, $id)
    {
        $marca = MarcaClasificacion::findOrFail($id);
        $marca->nombre = $request['nombre'];
        if ($marca->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('marcas')->with(['message' => $mensaje]);
    }

    public function destroy($id)
    {
        $marca = MarcaClasificacion::findOrFail($id);
        if ($marca->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('marcas')->with(['message' => $mensaje]);
    }
}
