<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoFormRequest;
use App\Models\Categoria;
use App\Models\Contador;
use App\Models\Producto;
use App\Utils\Utils;
use Barryvdh\DomPDF\Facade as PDF;

class ProductoController extends Controller
{
    public function index(){

        return view('vistas.inventario.index',
            [
                'productos' => Producto::all()
            ]);
    }

    public function create(){

        return view('vistas.inventario.create',
            [
                'categorias' => Categoria::all(),
                'paises' => Utils::$PAISES,
            ]);
    }

    public function store(ProductoFormRequest $request)
    {

        $producto = new Producto();
        $producto->nombre = $request['nombre'];
        /*        $producto->foto = $request['foto'];
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $file->move(public_path() . '/img/productos/',
                        $file->getClientOriginalName());
                    $producto->foto = $file->getClientOriginalName();
                }else{
                    $producto->foto = 'default.png';
        }*/
        $producto->origen=$request['origen'];
        $producto->descripcion = $request['descripcion'];
        $producto->cantidad = 0;
        $producto->precio = $request['precio'];
        $producto->categoria_id = $request['categoria_id'];
        if ($producto->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('inventario')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {

        return view('vistas.inventario.edit',
            [
                'producto' => Producto::findOrFail($id),
                'categorias' => Categoria::all(),
                'paises' => Utils::$PAISES,
            ]);
    }

    public function update(ProductoFormRequest $request, $id)
    {

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request['nombre'];
/*        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $file->move(public_path() . '/img/productos/',
                $file->getClientOriginalName());
            $producto->foto = $file->getClientOriginalName();
        }*/
        $producto->origen=$request['origen'];
        $producto->descripcion = $request['descripcion'];
        $producto->precio = $request['precio'];
        $producto->categoria_id = $request['categoria_id'];
        if ($producto->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('inventario')->with(['message' => $mensaje]);
    }

    public function show($id)
    {

        return view('vistas.inventario.show',
            [
                'producto' => Producto::findOrFail($id),
            ]);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }
        return redirect('inventario')->with(['message' => $mensaje]);
    }

    public function reporte(){
        $pdf = PDF::loadView('vistas.inventario.reporte',[ 'productos' => Producto::all()->sortBy('categoria_id')])->setPaper('letter', 'landscape');
        //portrait-landscape
        return $pdf->download('inventario_'.date('d-m-Y_H_i_s').'.pdf');
    }

}
