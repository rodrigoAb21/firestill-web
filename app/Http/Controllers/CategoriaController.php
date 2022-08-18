<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaFormRequest;
use App\Models\Categoria;
use App\Utils\Utils;


class CategoriaController extends Controller
{

    public function index(){
        return view('vistas.categorias.index',
            [
                'categorias' => Categoria::all()
            ]);
    }

    public function create(){
        return view('vistas.categorias.create');
    }

    public function store(CategoriaFormRequest $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request['nombre'];
        if ($categoria->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('categorias')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {
        return view('vistas.categorias.edit',
            [
                'categoria' => Categoria::findOrFail($id),
            ]);
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request['nombre'];
        if ($categoria->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('categorias')->with(['message' => $mensaje]);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        if ($categoria->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('categorias')->with(['message' => $mensaje]);
    }
}
