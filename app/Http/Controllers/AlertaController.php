<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: AlertaController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar las
     * categorías.
     * Fecha.........: 17-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     *************************************************************************
     * Metodo........: index
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 17-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.alertas.index',
            [
                'alertas' => Alerta::orderBy('id','desc')->paginate(5),
            ]);
    }

    public function marcarVista($alerta_id){
        $alerta = Alerta::findOrFail($alerta_id);
        $alerta->estado = false;
        $alerta->update();
        return redirect('alertas');
    }

    public function verEquipo($alerta_id, $equipo_id){
        $alerta = Alerta::findOrFail($alerta_id);
        $alerta->estado = false;
        $alerta->update();
        return redirect('imonitoreo/verEquipo/'.$equipo_id);
    }

    public function destroy($id)
    {
        $alerta = Alerta::findOrFail($id);
        $alerta->delete();

        return redirect('alertas');
    }
}
