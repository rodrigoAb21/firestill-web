<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioFormRequest;
use App\Models\Cliente;
use App\Models\DetalleNotaVenta;
use App\Models\Trabajador;
use App\Models\NotaVenta;
use App\Models\Producto;
use App\Models\Servicio;

use App\Utils\Utils;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function servicios()
    {
        return view('vistas.servicios.servicios', [
            'ventas' => NotaVenta::where('tipo', '=', false)->get()
        ]);
    }
    public function nuevoServicio()
    {
        return view('vistas.servicios.nuevoServicio',[
            'clientes' => Cliente::all(),
            'trabajadores' => Trabajador::all(),
            'productos' => Producto::where('cantidad', '>', 0)->get(),
        ]);
    }
    public function guardarServicio(ServicioFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $venta = new NotaVenta();
            $venta->fecha = $request['fecha'];
            $venta->total = $request['total'];
            $venta->tipo = false;
            $venta->trabajador_id = $request['trabajador_id'];
            $venta->cliente_id = $request['cliente_id'];
            $venta->save();

            $nombres = $request->get('nombresT');
            $preciosS = $request->get('preciosST');

            $idProductos = $request->get('idProductoT');
            $cant = $request->get('cantidadT');
            $precios = $request->get('precioT');

            $cont = 0;

            while ($cont < count($nombres)) {

                // --------- SERVICIOS ----------
                $servicio = new Servicio();
                $servicio->nombre = $nombres[$cont];
                $servicio->precio = $preciosS[$cont];
                $servicio->nota_venta_id = $venta->id;
                $servicio->save();

                $cont = $cont + 1;
            }

            if ($idProductos != null){
                $cont = 0;

                while ($cont < count($idProductos)){
                    // --------- DETALLE----------
                    $detalle = new DetalleNotaVenta();
                    $detalle->cantidad = $cant[$cont];
                    $detalle->precio = $precios[$cont];
                    $detalle->producto_id = $idProductos[$cont];
                    $detalle->nota_venta_id = $venta->id;
                    $detalle->save();

                    $producto =
                        Producto::findOrfail($detalle->producto_id);
                    $producto->cantidad =
                        $producto->cantidad - $detalle->cantidad;
                    $producto->update();

                    $cont = $cont + 1;
                }
            }


            DB::commit();
            $mensaje = Utils::$OPERACION_EXISTOSA;

        } catch (QueryException $e) {

            DB::rollback();
            $mensaje = Utils::$OPERACION_EXISTOSA;

        }

        return redirect('ventas/servicios')->with(['message' => $mensaje]);

    }
    public function verServicio($id)
    {
        return view('vistas.servicios.verServicio', [
            'venta' => NotaVenta::findOrFail($id),
        ]);
    }
    public function eliminarServicio($id)
    {
        $venta = NotaVenta::findOrFail($id);
        foreach ($venta->detalles as $detalle){
            $producto = Producto::withTrashed()->findOrFail($detalle->producto_id);
            $producto->cantidad = $producto->cantidad + $detalle->cantidad;
            $producto->update();
        }
        if ($venta->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('ventas/servicios')->with(['message' => $mensaje]);
    }
}
