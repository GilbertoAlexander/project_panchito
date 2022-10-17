<?php

use App\Http\Controllers\adminagregadosController;
use App\Http\Controllers\adminclientesController;
use App\Http\Controllers\admincorreosController;
use App\Http\Controllers\admincotizacionesagregadosController;
use App\Http\Controllers\admincotizacionesserviciosController;
use App\Http\Controllers\adminempresaController;
use App\Http\Controllers\adminequipoController;
use App\Http\Controllers\admininteresadosController;
use App\Http\Controllers\adminperfilController;
use App\Http\Controllers\adminserviciosController;
use App\Http\Controllers\landingagregadosController;
use App\Http\Controllers\landingController;
use App\Http\Controllers\landingserviciosController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// LANDING
    Route::get('/', [landingController::class, 'index']);
    Route::get('nosotros', [landingController::class, 'nosotros']);
    
    Route::get('servicios', [landingserviciosController::class, 'index'])->name('servicios.index');
    Route::get('servicios/{servicio}', [landingserviciosController::class, 'servicio_show']);
    Route::post('/servicios_cotizacion', [landingserviciosController::class, 'servicio_cotizacion']);
    Route::get('cotizacion_detalle/servicios', [landingserviciosController::class, 'servicio_detalle'])->name('cotizacion.servicio');
    Route::post('/servicios_cotizacion/detalle', [landingserviciosController::class, 'store_cotizacion_detalle']);
    Route::get('confirmacion_cotizacion/{confirmacion_cotizacion}', [landingserviciosController::class, 'confirmacion_cotizacion'])->name('confirmacion.cotizacion');

    Route::get('agregados', [landingagregadosController::class, 'index'])->name('agregados.index');
    Route::get('agregados/{agregado}', [landingagregadosController::class, 'agregado_show']);
    Route::post('agregados/cotizacion', [landingagregadosController::class, 'agregado_cotizacion']);
    Route::get('cotizacion_detalle/agregados', [landingagregadosController::class, 'agregado_detalle'])->name('cotizacion.agregado');
    Route::post('/agregados_cotizacion/detalle', [landingagregadosController::class, 'store_cotizacion_detalle']);
    Route::get('confirmacion_cotizacion/agregado/{confirmacion_cotizacion}', [landingagregadosController::class, 'confirmacion_cotizacion'])->name('confirmacion.cotizacion_agregado');

    Route::get('contacto', [landingController::class, 'contacto'])->name('contacto.email');
    Route::post('contacto/store', [landingController::class, 'store_email']);

    Route::get('politica_de_cookies', [landingController::class, 'politicacookies']);
    Route::get('politica_de_privacidad', [landingController::class, 'politicaprivacidad']);
    Route::get('aviso_legal', [landingController::class, 'avisolegal']);
// FIN LANDING

// ADMINISTRADOR
    Route::resource('admin-empresa', adminempresaController::class);
    Route::resource('admin-perfil', adminperfilController::class);

    Route::resource('admin-equipo', adminequipoController::class);
    Route::put('admin-equipo/estado/{admin_equipo}', [adminequipoController::class, 'estado']);

    Route::resource('admin-clientes', adminclientesController::class);
    Route::put('admin-clientes/estado/{admin_cliente}', [adminclientesController::class, 'estado']);

    Route::resource('admin-servicios', adminserviciosController::class);
    Route::put('admin-servicios/estado/{admin_servicio}', [adminserviciosController::class, 'estado']);
    Route::get('/images/{id}/delete', [adminserviciosController::class, 'deleteImage']);

    Route::resource('admin-agregados', adminagregadosController::class);
    Route::put('admin-agregados/estado/{admin_agregado}', [adminagregadosController::class, 'estado']);

    Route::resource('admin-interesados', admininteresadosController::class);

    Route::resource('admin-cotizaciones-servicios', admincotizacionesserviciosController::class);

    Route::resource('admin-cotizaciones-agregados', admincotizacionesagregadosController::class);

    Route::resource('admin-correos', admincorreosController::class);
// FIN ADMINISTRADOR
