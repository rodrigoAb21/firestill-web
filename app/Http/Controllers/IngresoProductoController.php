<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngresoProductoFormRequest;
use App\Models\Contador;
use App\Models\DetalleIngresoProducto;
use App\Models\IngresoProducto;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Utils\Utils;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IngresoProductoController extends Controller
{
    public function listaIngresos()
    {
        return view('vistas.inventario.ingresos.listaIngresos',
            [
                'ingresos' => IngresoProducto::all()
            ]);
    }

    public function nuevoIngreso()
    {

        return view('vistas.inventario.ingresos.nuevoIngreso', [
            'productos' => Producto::all(),
            'proveedores' => Proveedor::all(),
        ]);
    }

    public function guardarIngreso(IngresoProductoFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $ingreso = new IngresoProducto();
            $ingreso->fecha = $request['fecha'];
            $ingreso->total = $request['total'];
/*            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path() . '/img/ingresoProducto/',
                    $file->getClientOriginalName());
                $ingreso->foto_factura = $file->getClientOriginalName();
            }else{
                $ingreso->foto_factura = 'default.png';
            }*/
            $ingreso->nro_factura = $request['nro_factura'];
            $ingreso->proveedor_id = $request['proveedor_id'];
            $ingreso->save();

            $idProductos = $request->get('idProductoT');
            $cant = $request->get('cantidadT');
            $costos = $request->get('costoT');
            $cont = 0;


            while ($cont < count($idProductos)) {
                $detalle = new DetalleIngresoProducto();
                $detalle->cantidad = $cant[$cont];
                $detalle->costo = $costos[$cont];
                $detalle->producto_id = $idProductos[$cont];
                $detalle->ingreso_producto_id = $ingreso->id;
                $detalle->save();

                $producto =
                    Producto::findOrfail($detalle->producto_id);
                $producto->cantidad =
                    $producto->cantidad + $detalle->cantidad;
                $producto->update();

                $cont = $cont + 1;
            }

            DB::commit();
            $mensaje = Utils::$OPERACION_EXISTOSA;

        } catch (Exception $e) {

            DB::rollback();
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('inventario/listaIngresos')->with(['message' => $mensaje]);
    }

    public function verIngreso($id)
    {

        return view('vistas.inventario.ingresos.verIngreso', [
            'ingreso' => IngresoProducto::findOrFail($id),

        ]);
    }

    public function eliminarIngreso($id)
    {

        try {
            DB::beginTransaction();
            $ingreso = IngresoProducto::findOrFail($id);
            foreach ($ingreso->detalles as $detalle) {
                $producto = Producto::findOrFail($detalle->producto_id);
                $producto->cantidad = $producto->cantidad - $detalle->cantidad;
                $producto->update();
            }
            $ingreso->delete();
            DB::commit();
            $mensaje = Utils::$OPERACION_EXISTOSA;

        }catch (QueryException $e) {
            DB::rollback();
            $mensaje = Utils::$OPERACION_NO_EXITOSA;

        }

        return redirect('inventario/listaIngresos')->with(['message' => $mensaje]);

    }
}
