<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Utils\Utils;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: ProveedorController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar los
     * proveedores.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     *************************************************************************
     * Nombre........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista de proveedores
     * Descripcion...: Una lista de proveedores que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.proveedores.index',
            [
                'proveedores' => Proveedor::all()
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo proveedor, con las monedas y sucursales disponibles
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){
        return view('vistas.proveedores.create', [
            'monedas' => Utils::$MONEDAS,
            'sucursales' => Utils::$DEPARTAMENTOS,
        ]);
    }



    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de proveedores
     * Descripcion...: Crea un nuevo proveedor con los datos obtenidos de la
     * solicitud HTTP.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'nit' => 'nullable|numeric|min:0',
            'email' => 'nullable|email',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|numeric|digits_between:7,8',
            'informacion' => 'nullable|string|max:255',
            'titular' => 'nullable|string|max:255',
            'banco' => 'nullable|string|max:255',
            'sucursal' => 'nullable|string|max:255',
            'nro_cuenta' => 'nullable|numeric|min:0',
            'moneda' => 'nullable|string|max:255',
            'tipo_identificacion' => 'nullable|string|max:255',
            'nro_identificacion' => 'nullable|string|max:255',
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre = $request['nombre'];
        $proveedor->nit = $request['nit'];
        $proveedor->email = $request['email'];
        $proveedor->telefono = $request['telefono'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->informacion = $request['informacion'];
        $proveedor->titular = $request['titular'];
        $proveedor->banco = $request['banco'];
        $proveedor->sucursal = $request['sucursal'];
        $proveedor->nro_cuenta = $request['nro_cuenta'];
        $proveedor->moneda = $request['moneda'];
        $proveedor->tipo_identificacion = $request['tipo_identificacion'];
        $proveedor->nro_identificacion = $request['nro_identificacion'];
        $proveedor->save();

        return redirect('proveedores');
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del proveedor que se quiere editar
     * Salida........: Una vista con el proveedor que se quiere editar, y dos
     * listas de objetos.
     * Descripcion...: Obtiene el proveedor buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.proveedores.edit', [
            'monedas' => Utils::$MONEDAS,
            'sucursales' => Utils::$DEPARTAMENTOS,
            'proveedor' => Proveedor::findOrFail($id),
        ]);
    }


    /**
     *************************************************************************
     * Nombre........: show
     * Tipo..........: Funcion
     * Entrada.......: int: id del proveedor que se quiere ver
     * Salida........: Una vista con el proveedor.
     * Descripcion...: Obtiene el proveedor y muestra todos sus datos en
     * una vista.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        return view('vistas.proveedores.show',
            [
                'proveedor' => Proveedor::findOrFail($id),
            ]);
    }



    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de proveedores
     * Descripcion...: Obtiene el proveedor a través de su id, y reemplaza todos
     * sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'nit' => 'nullable|numeric|min:0',
            'email' => 'nullable|email',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|numeric|digits_between:7,8',
            'informacion' => 'nullable|string|max:255',
            'titular' => 'nullable|string|max:255',
            'banco' => 'nullable|string|max:255',
            'sucursal' => 'nullable|string|max:255',
            'nro_cuenta' => 'nullable|numeric|min:0',
            'moneda' => 'nullable|string|max:255',
            'tipo_identificacion' => 'nullable|string|max:255',
            'nro_identificacion' => 'nullable|string|max:255',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request['nombre'];
        $proveedor->nit = $request['nit'];
        $proveedor->email = $request['email'];
        $proveedor->telefono = $request['telefono'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->informacion = $request['informacion'];
        $proveedor->titular = $request['titular'];
        $proveedor->banco = $request['banco'];
        $proveedor->sucursal = $request['sucursal'];
        $proveedor->nro_cuenta = $request['nro_cuenta'];
        $proveedor->moneda = $request['moneda'];
        $proveedor->tipo_identificacion = $request['tipo_identificacion'];
        $proveedor->nro_identificacion = $request['nro_identificacion'];
        $proveedor->update();

        return redirect('proveedores');
    }



    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int: id del proveedor
     * Salida........: Ninguna, solo redirecciona a la url 'proveedores'
     * Descripcion...: Obtiene el proveedor, lo elimina (softDelete) y
     * redirecciona a la url 'proveedores'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect('proveedores');
    }
}
