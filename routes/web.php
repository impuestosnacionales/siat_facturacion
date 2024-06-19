<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContribuyenteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ImpresionController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\DocumentosFController;
use App\Http\Controllers\DocumentoSectorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;


Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/grafico', [HomeController::class, 'grafico'])->name('chart');
Route::get('/grafico-roles', [RolController::class, 'grafico'])->name('chart.roles');

Route::get('/login', [SessionsController::class, 'create'])->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/pdf', function(){
    $pdf = PDF::loadView('actividad');
    return $pdf->stream();
})->name('pdf');

Route::get('/sucursal', [SucursalController::class, 'index'])->name('sucursal');
Route::post('/sucursal', [SucursalController::class, 'store'])->name('sucursal.store');
Route::delete('/sucursal/{id}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
Route::put('/sucursal/{id}', [SucursalController::class, 'update'])->name('sucursal.update');

Route::get('/documentof', [DocumentosFController::class, 'index'])->name('documentosf');
Route::post('/documentof', [DocumentosFController::class, 'store'])->name('documentosf.store');
Route::delete('/documentof/{id}', [DocumentosFController::class, 'destroy'])->name('documentosf.destroy');
Route::put('/documentof/{id}', [DocumentosFController::class, 'update'])->name('documentosf.update');


Route::get('/documentos', [DocumentoSectorController::class, 'index'])->name('documentos');
Route::post('/documentos', [DocumentoSectorController::class, 'store'])->name('documentos.store');
Route::delete('/documentos/{id}', [DocumentoSectorController::class, 'destroy'])->name('documentos.destroy');
Route::put('/documentos/{id}', [DocumentoSectorController::class, 'update'])->name('documentos.update');
Route::get('/documentos/crear',[DocumentoSectorController::class,'create'])->name('documentos.create');

Route::get('/actividad', [ActividadController::class, 'index'])->name('actividad');
Route::post('/actividad', [ActividadController::class, 'store'])->name('actividad.store');
Route::delete('/actividad/{id}', [ActividadController::class, 'destroy'])->name('actividad.destroy');
Route::put('/actividad/{id}', [ActividadController::class, 'update'])->name('actividad.update');

Route::get('/unidad', [UnidadController::class, 'index'])->name('unidad');
Route::post('/unidad', [UnidadController::class, 'store'])->name('unidad.store');
Route::delete('/unidad/{id}', [UnidadController::class, 'destroy'])->name('unidad.destroy');
Route::put('/unidad/{id}', [UnidadController::class, 'update'])->name('unidad.update');

Route::get('/clientes/buscarPorNit', [ClienteController::class, 'buscarPorNit'])->name('cliente.buscarPorNit');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');
Route::get('/cliente/crear', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/{id}/ver', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/cliente/{id}/editar', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{id}', [ClienteController::class, 'update'])->name('cliente.update');

Route::get('/tipodoc', [TipoDocumentoController::class, 'index'])->name('tipodoc');
Route::post('/tipodoc', [TipoDocumentoController::class, 'store'])->name('tipodoc.store');
Route::delete('/tipodoc/{id}', [TipoDocumentoController::class, 'destroy'])->name('tipodoc.destroy');
Route::put('/tipodoc/{id}', [TipoDocumentoController::class, 'update'])->name('tipodoc.update');

Route::get('/impresion', [ImpresionController::class, 'index'])->name('impresion');
Route::get('/impresion/crear', [ImpresionController::class, 'create'])->name('impresion.create');
Route::post('/impresion', [ImpresionController::class, 'store'])->name('impresion.store');
Route::delete('/impresion/{id}', [ImpresionController::class, 'destroy'])->name('impresion.destroy');

Route::get('/dependencia', [DependenciaController::class, 'index'])->name('dependencia');
Route::post('/dependencia', [DependenciaController::class, 'store'])->name('dependencia.store');
Route::delete('/dependencia/{id}', [DependenciaController::class, 'destroy'])->name('dependencia.destroy');
Route::put('/dependencia/{id}', [DependenciaController::class, 'update'])->name('dependencia.update');

Route::get('/producto', [ProductoController::class, 'index'])->name('producto');
Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::get('/actividades/load', [ProductoController::class, 'loadActivities'])->name('actividades.load');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');