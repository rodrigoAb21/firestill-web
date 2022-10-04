<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsignacionHerramientaFormRequest;
use App\Http\Requests\ReingresoHerramientaFormRequest;
use App\Models\AsignacionHerramienta;
use App\Models\BajaHerramienta;
use App\Models\DetalleAsignacion;
use App\Models\DetalleReingreso;
use App\Models\Herramienta;
use App\Models\Reingreso;
use App\Models\Trabajador;
use App\Utils\Utils;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    // ------------------------------------------------------------------------
    // --------------------------ASIGNACIONES----------------------------------
    // ------------------------------------------------------------------------


    public function listaAsignaciones()
    {
        return view('vistas.herramientas.asignaciones.listaAsignaciones', [
            'asignaciones' => AsignacionHerramienta::orderBy('id', 'desc')->paginate(5),
        ]);
    }

    public function nuevaAsignacion()
    {
        return view('vistas.herramientas.asignaciones.nuevaAsignacion',
            [
                'trabajadores' => Trabajador::all(),
                'herramientas' => Herramienta::all(),
            ]);
    }

    public function guardarAsignacion(AsignacionHerramientaFormRequest $request)
    {

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
            $mensaje = Utils::$OPERACION_EXISTOSA;

        } catch (QueryException $e) {

            DB::rollback();
            $mensaje = Utils::$OPERACION_NO_EXITOSA;

        }

        return redirect('herramientas/listaAsignaciones')->with(['message' => $mensaje]);
    }

    public function eliminarAsignacion($id)
    {
        $asignacion = AsignacionHerramienta::findOrFail($id);
        if ($asignacion->estado == 'Activa'){
            foreach ($asignacion->detalles as $detalle) {
                $herramienta =
                    Herramienta::findOrFail($detalle->herramienta_id);
                $herramienta->cantidad_asignada =
                    $herramienta->cantidad_asignada - $detalle->cantidad;
                $herramienta->cantidad_taller =
                    $herramienta->cantidad_taller + $detalle->cantidad;
                $herramienta->update();
            }
        }
        if ($asignacion->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('herramientas/listaAsignaciones')->with(['message' => $mensaje]);
    }

    public function reingreso($id)
    {
        return view('vistas.herramientas.asignaciones.reingreso',
            [
                'asignacion' => AsignacionHerramienta::findOrFail($id),
            ]);
    }

    public function guardarReingreso(ReingresoHerramientaFormRequest $request, $id)
    {

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


                $herramienta = Herramienta::findOrFail($idHerramientas[$cont]);
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
            $mensaje = Utils::$OPERACION_EXISTOSA;

        } catch (QueryException $e) {

            DB::rollback();
            $mensaje = Utils::$OPERACION_NO_EXITOSA;

        }

        return redirect('herramientas/listaAsignaciones')->with(['message' => $mensaje]);
    }

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
