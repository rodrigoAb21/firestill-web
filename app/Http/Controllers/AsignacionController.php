<?php

namespace App\Http\Controllers;

use App\Models\AsignacionHerramienta;
use App\Models\BajaHerramienta;
use App\Models\DetalleAsignacion;
use App\Models\DetalleReingreso;
use App\Models\Herramienta;
use App\Models\Reingreso;
use App\Models\Trabajador;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    // ------------------------------------------------------------------------
    // --------------------------ASIGNACIONES----------------------------------
    // ------------------------------------------------------------------------

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function listaAsignaciones()
    {
        return view('vistas.herramientas.asignaciones.listaAsignaciones', [
            'asignaciones' => AsignacionHerramienta::orderBy('id', 'desc')->paginate(5),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function nuevaAsignacion()
    {
        return view('vistas.herramientas.asignaciones.nuevaAsignacion',
            [
                'trabajadores' => Trabajador::all(),
                'herramientas' => Herramienta::all(),
            ]);
    }
    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function guardarAsignacion(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'idHerramientaT' => 'required|array|min:1',
            'idHerramientaT.*' => 'required|numeric|min:1',
            'cantidadT' => 'required|array|min:1',
            'cantidadT.*' => 'required|numeric|min:1',
            'trabajador_id' => 'required|numeric|min:1',
        ]);

        try {
            DB::beginTransaction();
            $asignacion = new AsignacionHerramienta();
            $asignacion->fecha = $request['fecha'];
            $asignacion->estado = 'Activa';
            $asignacion->trabajador_id = $request['trabajador_id'];
            $asignacion->save();

            $idHerramientas = $request->get('idHerramientaT');
            $cant = $request->get('cantidadT');
            $cont = 0;

            while ($cont < count($idHerramientas)) {
                $detalle = new DetalleAsignacion();
                $detalle->cantidad = $cant[$cont];
                $detalle->herramienta_id = $idHerramientas[$cont];
                $detalle->asignacion_herramienta_id = $asignacion->id;
                $detalle->save();

                $herramientaAct =
                    Herramienta::findOrfail($detalle->herramienta_id);
                $herramientaAct->cantidad_asignada =
                    $herramientaAct->cantidad_asignada + $detalle->cantidad;
                $herramientaAct->cantidad_taller =
                    $herramientaAct->cantidad_taller - $detalle->cantidad;
                $herramientaAct->update();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

            return redirect('herramientas/listaAsignaciones')->with(['message' => 'No es posible realizar la asignacion.']);

        }

        return redirect('herramientas/listaAsignaciones');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function eliminarAsignacion($id)
    {
        $asignacion = AsignacionHerramienta::findOrFail($id);
        if ($asignacion->estado == 'Activa'){
            foreach ($asignacion->detalles as $detalle) {
                $herramienta =
                    Herramienta::withTrashed()->findOrFail($detalle->herramienta_id);
                $herramienta->cantidad_asignada =
                    $herramienta->cantidad_asignada - $detalle->cantidad;
                $herramienta->cantidad_taller =
                    $herramienta->cantidad_taller + $detalle->cantidad;
                $herramienta->update();
            }
        }
        $asignacion->delete();

        return redirect('herramientas/listaAsignaciones');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function reingreso($id)
    {
        return view('vistas.herramientas.asignaciones.reingreso',
            [
                'asignacion' => AsignacionHerramienta::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function guardarReingreso(Request $request, $id)
    {

        $this->validate($request, [
            'idHerramientaT' => 'required|array|min:1',
            'idHerramientaT.*' => 'required|numeric|min:0',
            'cantidadAT' => 'required|array|min:1',
            'cantidadAT.*' => 'required|numeric|min:0',
            'cantidadRT' => 'required|array|min:1',
            'cantidadRT.*' => 'required|numeric|min:0',
            'motivoT' => 'nullable|array|min:1',
            'motivoT.*' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();
            $asignacion = AsignacionHerramienta::findOrFail($id);
            $asignacion->estado = 'Finalizada';
            $asignacion->update();

            $idHerramientas = $request->get('idHerramientaT');
            $cantA = $request->get('cantidadAT');
            $cantR = $request->get('cantidadRT');
            $motivo = $request->get('motivoT');
            $cont = 0;

            $reingreso = new Reingreso();
            $reingreso->fecha = $request->get('fecha');
            $reingreso->asignacion_herramienta_id = $id;
            $reingreso->save();


            while ($cont < count($idHerramientas)) {
                $detalle_reingreso = new DetalleReingreso();
                $detalle_reingreso->cantidad = $cantR[$cont];
                $detalle_reingreso->reingreso_id = $reingreso->id;
                $detalle_reingreso->herramienta_id = $idHerramientas[$cont];


                $herramienta = Herramienta::withTrashed()->findOrFail($idHerramientas[$cont]);
                $herramienta->cantidad_asignada = $herramienta->cantidad_asignada -  $cantA[$cont];
                $herramienta->cantidad_taller = $herramienta->cantidad_taller + $cantR[$cont];
                $cantidad =  $cantA[$cont] - $cantR[$cont];

                if ($cantidad > 0){
                    $baja  = new BajaHerramienta();
                    $baja->fecha = date('Y-m-d');
                    $baja->motivo = $motivo[$cont];
                    $detalle_reingreso->motivo = $motivo[$cont];
                    $baja->cantidad = $cantidad;
                    $baja->herramienta_id = $idHerramientas[$cont];
                    $baja->trabajador_id = $asignacion->trabajador_id;
                    $baja->save();

                    $herramienta->cantidad_total = $herramienta->cantidad_total - $baja->cantidad;
                }
                $detalle_reingreso->save();

                $herramienta->update();

                $cont = $cont + 1;
            }
            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

            return redirect('herramientas/listaAsignaciones')->with(['message' => 'No se pudo realizar el reingreso.']);

        }



        return redirect('herramientas/listaAsignaciones');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function verAsignacion($id)
    {
        $reingreso = Reingreso::where('asignacion_herramienta_id', '=', $id)->first();
        $asignacion = AsignacionHerramienta::findOrFail($id);
        if ($reingreso != null){
            $detalles = $asignacion->detalles;
            $detalles_reingreso = $reingreso->detalles;
            foreach ($detalles as $detalle){
                foreach ($detalles_reingreso as $detalle_reingreso){
                    if ($detalle_reingreso->herramienta_id == $detalle->herramienta_id){
                        $detalle->cantidad_reingreso = $detalle_reingreso->cantidad;
                        $detalle->motivo = $detalle_reingreso->motivo;
                    }
                }
            }
            return view('vistas.herramientas.asignaciones.verAsignacion2', [
                'asignacion' => $asignacion,
                'detalles' => $detalles,
            ]);
        }


        return view('vistas.herramientas.asignaciones.verAsignacion', [
            'asignacion' => $asignacion
        ]);
    }
}
