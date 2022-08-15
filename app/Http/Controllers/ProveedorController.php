<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorFormRequest;
use App\Models\Proveedor;
use App\Utils\Utils;

class ProveedorController extends Controller
{
    public function index(){
        return view('vistas.proveedores.index',
            [
                'proveedores' => Proveedor::all()
            ]);
    }

    public function create(){
        return view('vistas.proveedores.create', [
            'monedas' => Utils::$MONEDAS,
            'sucursales' => Utils::$DEPARTAMENTOS,
        ]);
    }

    public function store(ProveedorFormRequest $request)
    {

        $proveedor = new Proveedor();
        $proveedor->nombre = $request['nombre'];
        $proveedor->nit = $request['nit'];
        $proveedor->email = $request['email'];
        $proveedor->telefono = $request['telefono'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->informacion = $request['informacion'];
        $proveedor->titular = $request['titular'];
        $proveedor->banco = $request['banco'];
        $proveedor->sucursal = $request['sucursal'];
        $proveedor->nro_cuenta = $request['nro_cuenta'];
        $proveedor->moneda = $request['moneda'];
        $proveedor->tipo_identificacion = $request['tipo_identificacion'];
        $proveedor->nro_identificacion = $request['nro_identificacion'];
        if($proveedor->save()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('proveedores')->with(['message' => $mensaje]);
    }

    public function edit($id)
    {
        return view('vistas.proveedores.edit', [
            'monedas' => Utils::$MONEDAS,
            'sucursales' => Utils::$DEPARTAMENTOS,
            'proveedor' => Proveedor::findOrFail($id),
        ]);
    }

    public function show($id)
    {
        return view('vistas.proveedores.show',
            [
                'proveedor' => Proveedor::findOrFail($id),
            ]);
    }

    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request['nombre'];
        $proveedor->nit = $request['nit'];
        $proveedor->email = $request['email'];
        $proveedor->telefono = $request['telefono'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->informacion = $request['informacion'];
        $proveedor->titular = $request['titular'];
        $proveedor->banco = $request['banco'];
        $proveedor->sucursal = $request['sucursal'];
        $proveedor->nro_cuenta = $request['nro_cuenta'];
        $proveedor->moneda = $request['moneda'];
        $proveedor->tipo_identificacion = $request['tipo_identificacion'];
        $proveedor->nro_identificacion = $request['nro_identificacion'];
        if($proveedor->update()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('proveedores')->with(['message' => $mensaje]);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        if($proveedor->delete()){
            $mensaje = Utils::$OPERACION_EXISTOSA;
        } else {
            $mensaje = Utils::$OPERACION_NO_EXITOSA;
        }

        return redirect('proveedores')->with(['message' => $mensaje]);
    }
}
