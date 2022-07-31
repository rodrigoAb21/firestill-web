<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleNotaVenta;
use App\Models\Trabajador;
use App\Models\NotaVenta;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
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
    public function guardarVenta(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'trabajador_id' => 'nullable|numeric|min:0',
            'cliente_id' => 'required|numeric|min:1',
            'total' => 'required|numeric|min:0',
            'idProductoT' => 'required|array|min:1',
            'idProductoT.*' => 'required|numeric|min:1',
            'cantidadT' => 'required|array|min:1',
            'cantidadT.*' => 'required|numeric|min:1',
            'precioT' => 'required|array|min:1',
            'precioT.*' => 'required|numeric|min:1',
        ]);

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

        } catch (QueryException $e) {

            DB::rollback();

            return redirect('ventas/ventas')->with(['message' => 'No es posible realizar la venta.']);
        }

        return redirect('ventas/ventas');

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
            $producto = Producto::withTrashed()->findOrFail($detalle->producto_id);
            $producto->cantidad = $producto->cantidad + $detalle->cantidad;
            $producto->update();
        }
        $venta->delete();

        return redirect('ventas/ventas');
    }
}
