<?php

namespace App\Http\Controllers;

use App\Models\MarcaClasificacion;
use Illuminate\Http\Request;

class MarcaClasificacionController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: MarcaClasificacionController
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
     * Salida........: Vista y una lista paginada de marcas
     * Descripcion...: Una lista de marcas que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.marcas.index',
            [
                'marcas' => MarcaClasificacion::all()
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo marca
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){
        return view('vistas.marcas.create');
    }



    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'marcas'
     * Descripcion...: Crea un nuevo marca con los datos obtenidos de la
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
        $marca = new MarcaClasificacion();
        $marca->nombre = $request['nombre'];
        $marca->save();

        return redirect('marcas');
    }


    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del marca que se quiere editar
     * Salida........: Una vista con el marca que se quiere editar
     * Descripcion...: Obtiene el marca buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.marcas.edit',
            [
                'marca' => MarcaClasificacion::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'marcas'
     * Descripcion...: Obtiene el marca a través de su id, y reemplaza
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

        $marca = MarcaClasificacion::findOrFail($id);
        $marca->nombre = $request['nombre'];
        $marca->update();

        return redirect('marcas');
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int:id de la marca
     * Salida........: Ninguna, solo redirecciona a la url 'marcas'
     * Descripcion...: Obtiene el marca, lo elimina (softDelete) y
     * redirecciona a la url 'marcas'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $marca = MarcaClasificacion::findOrFail($id);
        $marca->delete();

        return redirect('marcas');
    }
}
