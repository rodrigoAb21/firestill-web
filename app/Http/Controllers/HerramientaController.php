<?php

namespace App\Http\Controllers;

use App\Models\AsignacionHerramienta;
use App\Models\BajaHerramienta;
use App\Models\DetalleAsignacion;
use App\Models\DetalleIngresoHerramienta;
use App\Models\Trabajador;
use App\Models\Herramienta;
use App\Models\IngresoHerramienta;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HerramientaController extends Controller
{

    /**
     *************************************************************************
     * Clase.........: HerramientaController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar
     * las herramientas.
     * Fecha.........: 15-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    /**
     *************************************************************************
     * Metodo........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista de herramientas
     * Descripcion...: Obtiene una lista de herramientas paginada, y la
     * muestra en una vista.
     * Fecha.........: 15-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index()
    {
        return view('vistas.herramientas.index',
            [
                'herramientas' => Herramienta::all(),
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * una nueva herramienta
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create()
    {
        return view('vistas.herramientas.create');
    }

    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'herramientas'
     * Descripcion...: Crea una nueva herramienta con los datos obtenidos de
     * la solicitud HTTP y redirecciona a la url 'herramientas'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
        ]);

        $herramienta = new Herramienta();
        $herramienta->nombre = $request['nombre'];
        $herramienta->cantidad_taller = 0;
        $herramienta->cantidad_asignada = 0;
        $herramienta->cantidad_total = 0;
        $herramienta->save();

        return redirect('herramientas');
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id de la herramienta que se quiere editar
     * Salida........: Una vista con la herramienta que se quiere editar
     * Descripcion...: Obtiene la herramienta buscandola por su id, y la
     * muestra en un formulario con sus datos para poder ser editada.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.herramientas.edit',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: show
     * Tipo..........: Funcion
     * Entrada.......: int: id de la herramienta que se quiere ver
     * Salida........: Una vista con la herramienta.
     * Descripcion...: Obtiene la herramienta y muestra todos sus datos en
     * una vista.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        return view('vistas.herramientas.show',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'herramientas'
     * Descripcion...: Obtiene la herramienta a través de su id, y reemplaza
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

        $herramienta = Herramienta::findOrFail($id);
        $herramienta->nombre = $request['nombre'];
        $herramienta->save();
        $herramienta->update();

        return redirect('herramientas');
    }


    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int: id de la herramienta
     * Salida........: Ninguna, solo redirecciona a la url 'herramientas'
     * Descripcion...: Obtiene la herramienta, la elimina (softDelete) y
     * redirecciona a la url 'herramientas'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->delete();

        return redirect('herramientas');
    }

    // ------------------------------------------------------------------------
    // --------------------------INGRESOS--------------------------------------
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
    public function listaIngresos()
    {
        return view('vistas.herramientas.ingresos.listaIngresos',
            [
                'ingresos' => IngresoHerramienta::all(),
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
    public function nuevoIngreso()
    {
        return view('vistas.herramientas.ingresos.nuevoIngreso', [
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
    public function guardarIngreso(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'tienda' => 'required|string|max:255',
            'nro_factura' => 'nullable|numeric|min:0',
            'foto_factura' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'total' => 'required|numeric|min:1',
            'idHerramientaT' => 'required|array|min:1',
            'idHerramientaT.*' => 'required|numeric|min:1',
            'cantidadT' => 'required|array|min:1',
            'cantidadT.*' => 'required|numeric|min:1',
            'costoT' => 'required|array|min:1',
            'costoT.*' => 'required|numeric|min:1',
        ]);

        try {
            DB::beginTransaction();
            $ingreso = new IngresoHerramienta();
            $ingreso->fecha = $request['fecha'];
            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path() . '/img/ingresoHerramienta/',
                    $file->getClientOriginalName());
                $ingreso->foto_factura = $file->getClientOriginalName();
            }else{
                $ingreso->foto_factura = 'default.png';
            }
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

        } catch (QueryException $e) {

            DB::rollback();

        }

        return redirect('herramientas/listaIngresos');
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
    public function verIngreso($id)
    {
        return view('vistas.herramientas.ingresos.verIngreso', [
            'ingreso' => IngresoHerramienta::findOrFail($id),
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
    public function eliminarIngreso($id)
    {
        try {
            DB::beginTransaction();
            $ingreso = IngresoHerramienta::findOrFail($id);
            foreach ($ingreso->detalles as $detalle) {
                $herramienta =
                    Herramienta::withTrashed()->findOrFail($detalle->herramienta_id);
                $herramienta->cantidad_taller =
                    $herramienta->cantidad_taller - $detalle->cantidad;
                $herramienta->cantidad_total =
                    $herramienta->cantidad_total - $detalle->cantidad;
                $herramienta->update();
            }
            $ingreso->delete();
            DB::commit();

            return redirect('herramientas/listaIngresos');
        }catch (QueryException $e) {
            DB::rollback();
            return redirect('herramientas/listaIngresos')->with(['message' => 'No es posible eliminar el ingreso']);
        }

    }

    // ------------------------------------------------------------------------
    // --------------------------BAJAS--------------------------------------
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
    public function darBaja(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:255',
            'cantidad' => 'required|numeric|min:1',
            'herramienta_id' => 'required|numeric|min:1',
            'trabajador_id' => 'required|numeric|min:1',
        ]);

        $baja  = new BajaHerramienta();
        $baja->fecha = $request['fecha'];
        $baja->motivo = $request['motivo'];
        $baja->cantidad = $request['cantidad'];
        $baja->herramienta_id = $request['herramienta_id'];
        $baja->trabajador_id = $request['trabajador_id'];
        $baja->save();

        $herramienta = Herramienta::findOrFail($request['herramienta_id']);
        $herramienta->cantidad_taller =
            $herramienta->cantidad_taller - $baja->cantidad;
        $herramienta->cantidad_total =
            $herramienta->cantidad_total - $baja->cantidad;
        $herramienta->update();

        return redirect('herramientas/listaBajas');
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
            $herramienta = Herramienta::withTrashed()->findOrFail($baja->herramienta_id);
            $herramienta->cantidad_taller =
                $herramienta->cantidad_taller + $baja->cantidad;
            $herramienta->cantidad_total =
                $herramienta->cantidad_total + $baja->cantidad;
            $herramienta->update();
        $baja->delete();

        return redirect('herramientas/listaBajas');
    }

    public function reporte(){
        //return view('vistas.herramientas.reporte',[ 'herramientas' => Herramienta::all()->sortBy('nombre')]);

        $pdf = PDF::loadView('vistas.herramientas.reporte',[ 'herramientas' => Herramienta::all()->sortBy('nombre')])->setPaper('letter', 'portrait');
        return $pdf->download('inventario_herramientas_'.date('d-m-Y_H_i_s').'.pdf');

    }
}
