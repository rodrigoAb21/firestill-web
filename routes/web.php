<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/home', function () {
    return redirect('/');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::middleware('administrador')->group(function () {

        Route::resource('trabajadores', 'TrabajadorController');
        Route::post('trabajadores/search', 'TrabajadorController@search');
    });

    Route::resource('proveedores', 'ProveedorController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('categorias', 'CategoriaController');
    Route::resource('tipos', 'TipoClasificacionController');
    Route::resource('marcas', 'MarcaClasificacionController');
    //Route::resource('notificaciones', 'NotificacionController');

    // ------------------------------ INGRESO H -------------------------------------------

    Route::get('herramientas/listaIngresos', 'HerramientaController@listaIngresos');
    Route::get('herramientas/nuevoIngreso', 'HerramientaController@nuevoIngreso');
    Route::post('herramientas/guardarIngreso', 'HerramientaController@guardarIngreso');
    Route::get('herramientas/verIngreso/{id}', 'HerramientaController@verIngreso');
    Route::delete('herramientas/eliminarIngreso/{id}', 'HerramientaController@eliminarIngreso');


    // --------------------------------- BAJAS H -------------------------------------------
    Route::get('herramientas/listaBajas', 'HerramientaController@listaBajas');
    Route::get('herramientas/darBaja/{id}', 'HerramientaController@nuevaBaja');
    Route::post('herramientas/darBaja', 'HerramientaController@darBaja');
    Route::delete('herramientas/anularBaja/{id}', 'HerramientaController@anularBaja');

    // ------------------------------ ASIGNACIONES -------------------------------------------
    Route::get('herramientas/listaAsignaciones', 'AsignacionController@listaAsignaciones');
    Route::get('herramientas/nuevaAsignacion', 'AsignacionController@nuevaAsignacion');
    Route::post('herramientas/guardarAsignacion', 'AsignacionController@guardarAsignacion');
    Route::get('herramientas/reingreso/{id}', 'AsignacionController@reingreso');
    Route::post('herramientas/guardarReingreso/{id}', 'AsignacionController@guardarReingreso');
    Route::get('herramientas/verAsignacion/{id}', 'AsignacionController@verAsignacion');
    Route::delete('herramientas/eliminarAsignacion/{id}', 'AsignacionController@eliminarAsignacion');

    Route::get('herramientas/reporte', 'HerramientaController@reporte');

    Route::resource('herramientas', 'HerramientaController');

    // ------------------------------ CONTRATO -------------------------------------------

    Route::get('imonitoreo/listaContratos', 'ContratoController@listaContratos');
    Route::get('imonitoreo/nuevoContrato', 'ContratoController@nuevoContrato');
    Route::post('imonitoreo/guardarContrato', 'ContratoController@guardarContrato');
    Route::post('imonitoreo/finalizarEdicion/{id}', 'ContratoController@finalizarEdicion');
    Route::get('imonitoreo/editarContrato/{id}', 'ContratoController@editarContrato');
    Route::get('imonitoreo/verContrato/{id}', 'ContratoController@verContrato');
    Route::patch('imonitoreo/actualizarContrato/{id}', 'ContratoController@actualizarContrato');
    Route::delete('imonitoreo/eliminarContrato/{id}', 'ContratoController@eliminarContrato');


    // ------------------------------ SUCURSAL -------------------------------------------
    Route::post('imonitoreo/guardarSucursal', 'SucursalController@guardarSucursal');
    Route::get('imonitoreo/verSucursal/{id}', 'SucursalController@verSucursal');
    Route::get('imonitoreo/editarSucursal/{id}', 'SucursalController@editarSucursal');
    Route::patch('imonitoreo/actualizarSucursal/{id}', 'SucursalController@actualizarSucursal');
    Route::delete('imonitoreo/eliminarSucursal/{id}', 'SucursalController@eliminarSucursal');

    // ------------------------------- FICHAS ----------------------------------------
    Route::get('imonitoreo/listarFichas/{id}', 'FichaController@listarFichas');
    Route::get('imonitoreo/verFicha/{id}', 'FichaController@verFicha');


    // ------------------------------ EQUIPO -------------------------------------------
    Route::get('imonitoreo/nuevoEquipo/{sucursal_id}', 'EquipoController@nuevoEquipo');
    Route::get('imonitoreo/verEquipo/{id}', 'EquipoController@verEquipo');
    Route::post('imonitoreo/guardarEquipo', 'EquipoController@guardarEquipo');
    Route::get('imonitoreo/editarEquipo/{id}', 'EquipoController@editarEquipo');
    Route::patch('imonitoreo/actualizarEquipo/{id}', 'EquipoController@actualizarEquipo');
    Route::delete('imonitoreo/eliminarEquipo/{id}', 'EquipoController@eliminarEquipo');


    // ------------------------------- ALERTAS ------------------------------------------
    Route::get('alertas', 'AlertaController@index');
    Route::get('alertas/verEquipo/{alerta_id}/{equipo_id}', 'AlertaController@verEquipo');
    Route::get('alertas/marcarVista/{id}', 'AlertaController@marcarVista');
    Route::delete('alertas/{id}', 'AlertaController@destroy');


    // ------------------------------- INGRESO P ------------------------------------------
    Route::get('inventario/listaIngresos', 'IngresoProductoController@listaIngresos');
    Route::get('inventario/nuevoIngreso', 'IngresoProductoController@nuevoIngreso');
    Route::post('inventario/guardarIngreso', 'IngresoProductoController@guardarIngreso');
    Route::get('inventario/verIngreso/{id}', 'IngresoProductoController@verIngreso');
    Route::delete('inventario/eliminarIngreso/{id}', 'IngresoProductoController@eliminarIngreso');


    // --------------------------------- BAJAS P -------------------------------------------
    Route::get('inventario/listaBajas', 'BajaProductoController@listaBajas');
    Route::get('inventario/darBaja/{id}', 'BajaProductoController@nuevaBaja');
    Route::post('inventario/darBaja', 'BajaProductoController@darBaja');
    Route::delete('inventario/anularBaja/{id}', 'BajaProductoController@anularBaja');


    // --------------------------------- REPORTES -------------------------------------------
    Route::get('inventario/reporte', 'ProductoController@reporte');

    // --------------------------------- PRODUCTO -------------------------------------------
    Route::resource('inventario', 'ProductoController');

    // ------------------------------------- VENTAS ------------------------------------
    Route::get('ventas/ventas', 'VentaController@ventas');
    Route::get('ventas/nuevaVenta', 'VentaController@nuevaVenta');
    Route::post('ventas/guardarVenta', 'VentaController@guardarVenta');
    Route::get('ventas/verVenta/{id}', 'VentaController@verVenta');
    Route::delete('ventas/eliminarVenta/{id}', 'VentaController@eliminarVenta');


    // ------------------------------------- SERVICIOS ------------------------------------
    Route::get('ventas/servicios', 'ServicioController@servicios');
    Route::get('ventas/nuevoServicio', 'ServicioController@nuevoServicio');
    Route::post('ventas/guardarServicio', 'ServicioController@guardarServicio');
    Route::get('ventas/verServicio/{id}', 'ServicioController@verServicio');
    Route::delete('ventas/eliminarServicio/{id}', 'ServicioController@eliminarServicio');
    Route::get( '(.*)', function(){
        return redirect('/');
    });
});
