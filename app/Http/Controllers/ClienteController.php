<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use App\Utils\Utils;

class ClienteController extends Controller
{

    public function index(){
        return view('vistas.clientes.index',
            [
                'clientes' => Cliente::get(),
            ]);
    }

    public function create(){
        return view('vistas.clientes.create');
    }

    public function store(ClienteFormRequest $request)
    {
        $cliente = new Cliente();
        $cliente->nombre_empresa = $request['nombre_empresa'];
        $cliente->nit = $request['nit'];
        $cliente->email = $request['email'];
        $cliente->email_encargado = $request['email_encargado'];
        $cliente->telefono_empresa = $request['telefono_empresa'];
        $cliente->direccion = $request['direccion'];
        $cliente->nombre_encargado = $request['nombre_encargado'];
        $cliente->cargo_encargado = $request['cargo_encargado'];
        $cliente->telefono_encargado = $request['telefono_encargado'];

        if ($cliente->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('clientes')->with(['message' => $mensaje]);

    }

    public function edit($id)
    {
        return view('vistas.clientes.edit', [
            'cliente' => Cliente::findOrFail($id),
        ]);
    }

    public function show($id)
    {
        return view('vistas.clientes.show',
            [
                'cliente' => Cliente::findOrFail($id),
            ]);
    }

    public function update(ClienteFormRequest $request, $id)
    {

        $cliente = Cliente::findOrFail($id);
        $cliente->nombre_empresa = $request['nombre_empresa'];
        $cliente->nit = $request['nit'];
        $cliente->email = $request['email'];
        $cliente->email_encargado = $request['email_encargado'];
        $cliente->telefono_empresa = $request['telefono_empresa'];
        $cliente->direccion = $request['direccion'];
        $cliente->nombre_encargado = $request['nombre_encargado'];
        $cliente->cargo_encargado = $request['cargo_encargado'];
        $cliente->telefono_encargado = $request['telefono_encargado'];

        if ($cliente->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('clientes')->with(['message' => $mensaje]);

    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('clientes')->with(['message' => $mensaje]);

    }
}
