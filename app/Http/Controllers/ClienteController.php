<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: ClienteController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar
     * los clientes.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     *************************************************************************
     * Nombre........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista paginada de clientes
     * Descripcion...: Una lista de clientes que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.clientes.index',
            [
                'clientes' => Cliente::get(),
            ]);
    }



    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo cliente
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){
        return view('vistas.clientes.create');
    }



    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'clientes'
     * Descripcion...: Crea un nuevo cliente con los datos obtenidos de la
     * solicitud HTTP.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_empresa' => 'required|max:255',
            'nit' => 'nullable|numeric',
            'email' => 'nullable|email|max:255',
            'email_encargado' => 'nullable|email|max:255',
            'telefono_empresa' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|string|max:255',
            'nombre_encargado' => 'nullable|string|max:255',
            'cargo_encargado' => 'nullable|string|max:255',
            'telefono_encargado' => 'nullable|digits_between:7,8',
        ]);

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
        $cliente->save();

        return redirect('clientes');
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del cliente que se quiere editar
     * Salida........: Una vista con el cliente que se quiere editar
     * Descripcion...: Obtiene el cliente buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.clientes.edit', [
            'cliente' => Cliente::findOrFail($id),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del cliente que se quiere editar
     * Salida........: Una vista con el cliente que se quiere editar
     * Descripcion...: Obtiene el cliente buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        return view('vistas.clientes.show',
            [
                'cliente' => Cliente::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'clientes'
     * Descripcion...: Obtiene el cliente a través de su id, y reemplaza todos
     * sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_empresa' => 'required|max:255',
            'nit' => 'nullable|numeric',
            'email' => 'nullable|email|max:255',
            'email_encargado' => 'nullable|email|max:255',
            'telefono_empresa' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|string|max:255',
            'nombre_encargado' => 'nullable|string|max:255',
            'cargo_encargado' => 'nullable|string|max:255',
            'telefono_encargado' => 'nullable|digits_between:7,8',
        ]);

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
        $cliente->update();

        return redirect('clientes');
    }


    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int: id del cliente
     * Salida........: Ninguna, solo redirecciona a la url 'clientes'
     * Descripcion...: Obtiene el cliente, lo elimina (softDelete) y
     * redirecciona a la url 'clientes'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect('clientes');
    }
}
