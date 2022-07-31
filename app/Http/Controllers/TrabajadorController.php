<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: TrabajadorController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar los
     * trabajadores.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    /**
     *************************************************************************
     * Nombre........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista paginada de trabajadores
     * Descripcion...: Una lista de trabajadores que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.trabajadores.index',
            [
                'trabajadores' => Trabajador::all(),
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo trabajador
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){
        return view('vistas.trabajadores.create', [
            'tipos' => Utils::$TIPOS_DE_USUARIO,
        ]);
    }

    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'trabajadores'
     * Descripcion...: Crea un nuevo trabajador con los datos obtenidos de la
     * solicitud HTTP.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'carnet' => 'required|string|max:10',
            'telefono' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|max:255',
            'email' => 'required|max:255|email|unique:trabajador',
            'password' => 'nullable|string|max:255',
            'tipo' => 'required|max:255',
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
        $trabajador->save();

        return redirect('trabajadores');
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del trabajador que se quiere editar
     * Salida........: Una vista con el trabajador que se quiere editar
     * Descripcion...: Obtiene el trabajador buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.trabajadores.edit',
            [
                'trabajador' => Trabajador::findOrFail($id),
                'tipos' => Utils::$TIPOS_DE_USUARIO,
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: show
     * Tipo..........: Funcion
     * Entrada.......: int: id del trabajador que se quiere ver
     * Salida........: Una vista con el trabajador.
     * Descripcion...: Obtiene el trabajador y muestra todos sus datos en
     * una vista.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        return view('vistas.trabajadores.show',
            [
                'trabajador' => Trabajador::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'trabajadores'
     * Descripcion...: Obtiene el trabajador a través de su id, y reemplaza todos
     * sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'carnet' => 'required|string|max:10',
            'telefono' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|max:255',
            'email' => 'required|max:255|email',
            'password' => 'nullable|string|max:255',
            'tipo' => 'required|max:255',
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
        $trabajador->update();

        return redirect('trabajadores');
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int: id del trabajador
     * Salida........: Ninguna, solo redirecciona a la url 'trabajadores'
     * Descripcion...: Obtiene el trabajador, lo elimina (softDelete) y
     * redirecciona a la url 'trabajadores'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();

        return redirect('trabajadores');
    }

    public function search(Request $request){
        $data = $request->all();
        $palabra=$data['name'];
        $nro=$data['nro'];
        $resultadoX = Trabajador:: where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->orWhere('apellido', 'like', '%' . $palabra . '%')
            ->orWhere('carnet', $palabra)
            ->orWhere('telefono', $palabra)
            //->orWhere('edad', $palabra)
            ->orWhere('direccion', 'like', '%' . $palabra . '%')
            ->orWhere('tipo', 'like', '%' . $palabra . '%')
            ->orWhere('email', 'like', '%' . $palabra . '%')
            ->orderBy('id', 'desc')->paginate(10);

        $resultados = DB::table('trabajador')->
        where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->orWhere('apellido', 'like', '%' . $palabra . '%')
            ->orWhere('carnet', $palabra)
            ->orWhere('telefono', $palabra)
            //->orWhere('edad', $palabra)
            ->orWhere('direccion', 'like', '%' . $palabra . '%')
            ->orWhere('tipo', 'like', '%' . $palabra . '%')
            ->orWhere('email', 'like', '%' . $palabra . '%')
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Trabajador::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['trabajador'][]=$resultadoModelo;
        return response()->json(['success'=>$resultadoX]);
    }
}
