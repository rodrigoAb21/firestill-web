<?php

namespace App\Http\Controllers;

use App\Http\Requests\BajaHerramientaFormRequest;
use App\Http\Requests\HerramientaFormRequest;
use App\Http\Requests\IngresoHerramientaFormRequest;
use App\Models\BajaHerramienta;
use App\Models\DetalleIngresoHerramienta;
use App\Models\Trabajador;
use App\Models\Herramienta;
use App\Models\IngresoHerramienta;
use App\Utils\Utils;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class HerramientaController extends Controller
{

    public function index()
    {
        return view('vistas.herramientas.index',
            [
                'herramientas' => Herramienta::all(),
            ]);
    }

    public function create()
    {
        return view('vistas.herramientas.create');
    }

    public function store(HerramientaFormRequest $request)
    {

        $herramienta = new Herramienta();
        $herramienta->nombre = $request['nombre'];
        $herramienta->cantidad_taller = 0;
        $herramienta->cantidad_asignada = 0;
        $herramienta->cantidad_total = 0;
        if ($herramienta->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('herramientas')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {
        return view('vistas.herramientas.edit',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }

    public function show($id)
    {
        return view('vistas.herramientas.show',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }

    public function update(HerramientaFormRequest $request, $id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->nombre = $request['nombre'];

        if ($herramienta->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('herramientas')->with(['message' => $mensaje]);
    }

    public function destroy($id)
    {
        $herramienta = Herramienta::findOrFail($id);

        if ($herramienta->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('herramientas')->with(['message' => $mensaje]);
    }

    // ------------------------------------------------------------------------
    // --------------------------INGRESOS--------------------------------------
    // ------------------------------------------------------------------------

    public function listaIngresos()
    {
        return view('vistas.herramientas.ingresos.listaIngresos',
            [
                'ingresos' => IngresoHerramienta::all(),
            ]);
    }

    public function nuevoIngreso()
    {
        return view('vistas.herramientas.ingresos.nuevoIngreso', [
            'herramientas' => Herramienta::all(),
        ]);
    }

    public function guardarIngreso(IngresoHerramientaFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $ingreso = new IngresoHerramienta();
            $ingreso->fecha = $request['fecha'];
        /*    if ($request->hasFile('foto_factura')) {
                $file = $request->file('foto_factura');
                $file->move(public_path() . '/img/ingresoHerramienta/',
                    $file->getClientOriginalName());
                $ingreso->foto_factura = $file->getClientOriginalName();
            }else{
                $ingreso->foto_factura = 'default.png';
            }*/
            $ingreso->nro_factura = $request['nro_factura'];
            $ingreso->tienda = $request['tienda'];
            $ingreso->total = $request['total'];
            $ingreso->save();

            $idHerramientas = $request->get('idHerramientaT');
            $cant = $request->get('cantidadT');
            $costo = $request->get('costoT');
            $cont = 0;

            while ($cont < count($idHerramientas)) {
                $detalle = new DetalleIngresoHerramienta();
                $detalle->cantidad = $cant[$cont];
                $detalle->costo = $costo[$cont];
                $detalle->herramienta_id = $idHerramientas[$cont];
                $detalle->ingreso_herramienta_id = $ingreso->id;
                $detalle->save();

                $herramientaAct =
                    Herramienta::findOrfail($detalle->herramienta_id);
                $herramientaAct->cantidad_total =
                    $herramientaAct->cantidad_total + $detalle->cantidad;
                $herramientaAct->cantidad_taller =
                    $herramientaAct->cantidad_taller + $detalle->cantidad;
                $herramientaAct->update();

                $cont = $cont + 1;
            }

            DB::commit();
            $mensaje = Utils::$OPERACION_EXISTOSA;

        } catch (QueryException $e) {

            DB::rollback();
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('herramientas/listaIngresos')->with(['message' => $mensaje]);
    }

    public function verIngreso($id)
    {
        return view('vistas.herramientas.ingresos.verIngreso', [
            'ingreso' => IngresoHerramienta::findOrFail($id),
        ]);
    }

    public function eliminarIngreso($id)
    {
        try {
            DB::beginTransaction();
            $ingreso = IngresoHerramienta::findOrFail($id);
            foreach ($ingreso->detalles as $detalle) {
                $herramienta =
                    Herramienta::findOrFail($detalle->herramienta_id);
                $herramienta->cantidad_taller =
                    $herramienta->cantidad_taller - $detalle->cantidad;
                $herramienta->cantidad_total =
                    $herramienta->cantidad_total - $detalle->cantidad;
                $herramienta->update();
            }
            $ingreso->delete();
            DB::commit();
            $mensaje = Utils::$OPERACION_EXISTOSA;

        } catch (QueryException $e) {

            DB::rollback();
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('herramientas/listaIngresos')->with(['message' => $mensaje]);

    }

    // ------------------------------------------------------------------------
    // --------------------------BAJAS--------------------------------------
    // ------------------------------------------------------------------------

    public function listaBajas()
    {
        return view('vistas.herramientas.bajas.listaBajas',
            ['bajas' => BajaHerramienta::all()]);
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
    public function nuevaBaja($id)
    {
        return view('vistas.herramientas.bajas.nuevaBaja', [
            'herramienta' => Herramienta::findOrFail($id),
            'trabajadores' => Trabajador::all(),
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
    public function darBaja(BajaHerramientaFormRequest $request)
    {

        $baja  = new BajaHerramienta();
        $baja->fecha = $request['fecha'];
        $baja->motivo = $request['motivo'];
        $baja->cantidad = $request['cantidad'];
        $baja->herramienta_id = $request['herramienta_id'];
        $baja->trabajador_id = $request['trabajador_id'];
        if ($baja->save()){
            $herramienta = Herramienta::findOrFail($request['herramienta_id']);
            $herramienta->cantidad_taller =
                $herramienta->cantidad_taller - $baja->cantidad;
            $herramienta->cantidad_total =
                $herramienta->cantidad_total - $baja->cantidad;
            if ($herramienta->update()) {
                $mensaje = Utils::$OPERACION_EXISTOSA;
            }
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('herramientas/listaBajas')->with(['message' => $mensaje]);
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
    public function anularBaja($id)
    {
        $baja  = BajaHerramienta::findOrFail($id);
        $herramienta = Herramienta::findOrFail($baja->herramienta_id);
        $herramienta->cantidad_taller = $herramienta->cantidad_taller + $baja->cantidad;
        $herramienta->cantidad_total = $herramienta->cantidad_total + $baja->cantidad;
        if ($herramienta->update()){
            if ($baja->delete()) {
                $mensaje = Utils::$OPERACION_EXISTOSA;
            }
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('herramientas/listaBajas')->with(['message' => $mensaje]);
    }

    public function reporte(){
        //return view('vistas.herramientas.reporte',[ 'herramientas' => Herramienta::all()->sortBy('nombre')]);

        $pdf = PDF::loadView('vistas.herramientas.reporte',[ 'herramientas' => Herramienta::all()->sortBy('nombre')])->setPaper('letter', 'portrait');
        return $pdf->download('inventario_herramientas_'.date('d-m-Y_H_i_s').'.pdf');

    }
}
