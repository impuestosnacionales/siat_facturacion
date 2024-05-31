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
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');
Route::get('/cliente/crear', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/{id}/ver', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/cliente/{id}/editar', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{id}', [ClienteController::class, 'update'])->name('cliente.update');

Route::get('/tipodoc', [TipoDocumentoController::class, 'index'])->name('tipodoc');
Route::get('/tipodoc/crear', [TipoDocumentoController::class, 'create'])->name('tipodoc.create');
Route::post('/tipodoc', [TipoDocumentoController::class, 'store'])->name('tipodoc.store');

Route::get('/impresion', [ImpresionController::class, 'index'])->name('impresion');
Route::get('/impresion/crear', [ImpresionController::class, 'create'])->name('impresion.create');
Route::post('/impresion', [ImpresionController::class, 'store'])->name('impresion.store');

Route::get('/dependencia', [DependenciaController::class, 'index'])->name('dependencia');
Route::get('/dependencia/crear', [DependenciaController::class, 'create'])->name('dependencia.create');
Route::post('/dependencia', [DependenciaController::class, 'store'])->name('dependencia.store');

Route::get('/producto', [ProductoController::class, 'index'])->name('producto');
Route::get('/producto/crear', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/{id}/ver', [ProductoController::class, 'show'])->name('producto.show');
Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
Route::get('/producto/{id}/editar', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('producto.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

