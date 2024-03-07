<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaFormRequest;
use App\Models\Cliente;
use App\Models\DetalleNotaVenta;
use App\Models\Trabajador;
use App\Models\NotaVenta;
use App\Models\Producto;
use App\Utils\Utils;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function ventas()
    {
        return view('vistas.ventas.ventas', [
            'ventas' => NotaVenta::where('tipo', '=', true)->get()
        ]);
    }
    public function nuevaVenta()
    {
        return view('vistas.ventas.nuevaVenta',[
            'clientes' => Cliente::all(),
            'trabajadores' => Trabajador::all(),
            'productos' => Producto::where('cantidad', '>', 0)->get(),
        ]);
    }
    public function guardarVenta(VentaFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $venta = new NotaVenta();
            $venta->fecha = $request['fecha'];
            $venta->total = $request['total'];
            $venta->trabajador_id = $request['trabajador_id'];
            $venta->cliente_id = $request['cliente_id'];
            $venta->save();

            $idProductos = $request->get('idProductoT');
            $cant = $request->get('cantidadT');
            $precios = $request->get('precioT');
            $cont = 0;


            while ($cont < count($idProductos)) {
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

            DB::commit();
            $mensaje = Utils::$OPERACION_EXISTOSA;

        } catch (QueryException $e) {

            DB::rollback();
            $mensaje = Utils::$OPERACION_NO_EXITOSA;

        }

        return redirect('ventas/ventas')->with(['message' => $mensaje]);

    }
    public function verVenta($id)
    {
        return view('vistas.ventas.verVenta', [
            'venta' => NotaVenta::findOrFail($id),
        ]);
    }
    public function eliminarVenta($id)
    {
        $venta = NotaVenta::findOrFail($id);
        foreach ($venta->detalles as $detalle){
            $producto = Producto::findOrFail($detalle->producto_id);
            $producto->cantidad = $producto->cantidad + $detalle->cantidad;
            $producto->update();
        }
        if ($venta->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('ventas/ventas')->with(['message' => $mensaje]);
    }
}
