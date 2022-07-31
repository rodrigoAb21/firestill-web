<?php

namespace App\Http\Controllers;

use App\Models\TipoClasificacion;
use Illuminate\Http\Request;

class TipoClasificacionController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: TipoClasificacionController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar las
     * categorías.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     *************************************************************************
     * Nombre........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista paginada de tipos
     * Descripcion...: Una lista de tipos que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.tipos.index',
            [
                'tipos' => TipoClasificacion::all()
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo tipo
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){
        return view('vistas.tipos.create');
    }



    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'tipos'
     * Descripcion...: Crea un nuevo tipo con los datos obtenidos de la
     * solicitud HTTP.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
        ]);

        $tipo = new TipoClasificacion();
        $tipo->nombre = $request['nombre'];
        $tipo->save();

        return redirect('tipos');
    }


    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del tipo que se quiere editar
     * Salida........: Una vista con el tipo que se quiere editar
     * Descripcion...: Obtiene el tipo buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.tipos.edit',
            [
                'tipo' => TipoClasificacion::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'tipos'
     * Descripcion...: Obtiene el tipo a través de su id, y reemplaza
     * todos sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
        ]);

        $tipo = TipoClasificacion::findOrFail($id);
        $tipo->nombre = $request['nombre'];
        $tipo->update();

        return redirect('tipos');
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int:id del tipo
     * Salida........: Ninguna, solo redirecciona a la url 'tipos'
     * Descripcion...: Obtiene el tipo, lo elimina (softDelete) y
     * redirecciona a la url 'tipos'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $tipo = TipoClasificacion::findOrFail($id);
        $tipo->delete();

        return redirect('tipos');
    }
}
