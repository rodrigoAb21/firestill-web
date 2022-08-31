<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrabajadorFormRequest;
use App\Models\Trabajador;
use App\Utils\Utils;

class TrabajadorController extends Controller
{
    public function index(){
        return view('vistas.trabajadores.index',
            [
                'trabajadores' => Trabajador::all(),
            ]);
    }

    public function create(){
        return view('vistas.trabajadores.create', [
            'tipos' => Utils::$TIPOS_DE_USUARIO,
        ]);
    }

    public function store(TrabajadorFormRequest $request)
    {

        $this->validate($request, [
            'email' => "required|max:255|email|unique:trabajador,email",
        ]);

        $trabajador = new Trabajador();
        $trabajador->nombre = $request['nombre'];
        $trabajador->apellido = $request['apellido'];
        $trabajador->carnet = $request['carnet'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->direccion = $request['direccion'];
        $trabajador->email = $request['email'];
        $trabajador->password = bcrypt($request['carnet']);
        $trabajador->tipo = $request['tipo'];
        if ($trabajador->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('trabajadores')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {
        return view('vistas.trabajadores.edit',
            [
                'trabajador' => Trabajador::findOrFail($id),
                'tipos' => Utils::$TIPOS_DE_USUARIO,
            ]);
    }

    public function show($id)
    {
        return view('vistas.trabajadores.show',
            [
                'trabajador' => Trabajador::findOrFail($id),
            ]);
    }

    public function update(TrabajadorFormRequest $request, $id)
    {
        $this->validate($request, [
            'email' => "required|max:255|email|unique:trabajador,email,$id",
        ]);

        $trabajador = Trabajador::findOrFail($id);
        $trabajador->nombre = $request['nombre'];
        $trabajador->apellido = $request['apellido'];
        $trabajador->carnet = $request['carnet'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->direccion = $request['direccion'];
        $trabajador->email = $request['email'];
        if (trim($request['password']) != ''){
            $trabajador->password = bcrypt($request['password']);
        }
        $trabajador->tipo = $request['tipo'];
        if ($trabajador->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('trabajadores')->with(['message' => $mensaje]);
    }

    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        if ($trabajador->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('trabajadores')->with(['message' => $mensaje]);
    }

}
