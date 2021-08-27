<?php

use App\Events\ArduinoEvent;

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);

Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
])->middleware('auth');

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/home', function () {
    return redirect('/');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::middleware('administrador')->group(function () {
        Route::resource('trabajadores', 'TrabajadorController');
        Route::resource('proveedores', 'ProveedorController');
        Route::resource('clientes', 'ClienteController');
        Route::resource('categorias', 'CategoriaController');
        Route::resource('tipos', 'TipoClasificacionController');
        Route::resource('marcas', 'MarcaClasificacionController');
        Route::resource('notificaciones', 'NotificacionController');

        // ---------------------------------- REPORTES -------------------------------------------
        Route::get('reportes/reporteSitio', 'ReporteController@reporteSitio');
        Route::get('reportes/reporteVenta', 'ReporteController@reporteVenta');

    });





    // ------------------------------ CONTRATO -------------------------------------------

    Route::get('imonitoreo/listaContratos', 'MonitoreoController@listaContratos');
    Route::get('imonitoreo/nuevoContrato', 'MonitoreoController@nuevoContrato');
    Route::post('imonitoreo/guardarContrato', 'MonitoreoController@guardarContrato');
    Route::post('imonitoreo/finalizarEdicion/{id}', 'MonitoreoController@finalizarEdicion');
    Route::get('imonitoreo/editarContrato/{id}', 'MonitoreoController@editarContrato');
    Route::get('imonitoreo/verContrato/{id}', 'MonitoreoController@verContrato');
    Route::patch('imonitoreo/actualizarContrato/{id}', 'MonitoreoController@actualizarContrato');
    Route::delete('imonitoreo/eliminarContrato/{id}', 'MonitoreoController@eliminarContrato');


    // ------------------------------ SUCURSAL -------------------------------------------
    Route::post('imonitoreo/guardarSucursal', 'MonitoreoController@guardarSucursal');
    Route::get('imonitoreo/verSucursal/{id}', 'MonitoreoController@verSucursal');
    Route::get('imonitoreo/editarSucursal/{id}', 'MonitoreoController@editarSucursal');
    Route::patch('imonitoreo/actualizarSucursal/{id}', 'MonitoreoController@actualizarSucursal');
    Route::delete('imonitoreo/eliminarSucursal/{id}', 'MonitoreoController@eliminarSucursal');


    // ------------------------------ FICHAS -------------------------------------------
    Route::get('imonitoreo/listarFichas/{id}', 'MonitoreoController@listarFichas');
    Route::get('imonitoreo/verFicha/{id}', 'MonitoreoController@verFicha');
    Route::get('imonitoreo/nuevaFicha/{id}', 'MonitoreoController@nuevaFicha');
    Route::post('imonitoreo/guardarFicha/{id}', 'MonitoreoController@guardarFicha');
    Route::delete('imonitoreo/eliminarFicha/{id}', 'MonitoreoController@eliminarFicha');


    // ------------------------------ EQUIPO -------------------------------------------
    Route::get('imonitoreo/nuevoEquipo/{sucursal_id}', 'MonitoreoController@nuevoEquipo');
    Route::get('imonitoreo/verEquipo/{id}', 'MonitoreoController@verEquipo');
    Route::post('imonitoreo/guardarEquipo', 'MonitoreoController@guardarEquipo');
    Route::get('imonitoreo/editarEquipo/{id}', 'MonitoreoController@editarEquipo');
    Route::patch('imonitoreo/actualizarEquipo/{id}', 'MonitoreoController@actualizarEquipo');
    Route::delete('imonitoreo/eliminarEquipo/{id}', 'MonitoreoController@eliminarEquipo');


    // ------------------------------- ALERTAS ------------------------------------------
    Route::get('alertas', 'AlertaController@index');
    Route::get('alertas/verEquipo/{alerta_id}/{equipo_id}', 'AlertaController@verEquipo');
    Route::get('alertas/marcarVista/{id}', 'AlertaController@marcarVista');
    Route::delete('alertas/{id}', 'AlertaController@destroy');


    
    //-------------------------------------- BUSQUEDA ---------------------------------------
    Route::post('busqueda','BusquedaController@buscar');


    Route::middleware('venta')->group(function () {

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
        /******************/
        Route::get('inventario/reporte', 'ProductoController@reporte');
        Route::resource('inventario', 'ProductoController');
        /*****************/

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


    });


    Route::get( '(.*)', function(){
        return redirect('/');
    });
});

