<?php

namespace App\Http\Controllers;

use App\Models\BajaProducto;
use App\Models\Contador;
use App\Models\Producto;

use App\Utils\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BajaProductoController extends Controller
{
    public function listaBajas()
    {

        return view('vistas.inventario.bajas.listaBajas',[
            'bajas' => BajaProducto::all()
        ]);
    }

    public function nuevaBaja($id)
    {
        return view('vistas.inventario.bajas.nuevaBaja', [
            'producto' => Producto::findOrFail($id),
        ]);
    }

    public function darBaja(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:255',
            'cantidad' => 'required|numeric|min:1',
            'producto_id' => 'required|numeric|min:1',
        ]);

        $baja = new BajaProducto();
        $baja->fecha = $request['fecha'];
        $baja->motivo = $request['motivo'];
        $baja->cantidad = $request['cantidad'];
        $baja->producto_id = $request['producto_id'];
        $baja->save();
        $producto = Producto::findOrFail($request['producto_id']);
        $producto->cantidad = $producto->cantidad - $baja->cantidad;
        if ($producto->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('inventario/listaBajas')->with(['mensaje' => $mensaje]);
    }


    public function anularBaja($id)
    {

        $baja = BajaProducto::findOrFail($id);
        $producto = Producto::withTrashed()->findOrFail($baja->producto_id);
        $producto->cantidad = $producto->cantidad + $baja->cantidad;
        $producto->update();
        if ($baja->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('inventario/listaBajas')->with(['mensaje' => $mensaje]);
    }



}
