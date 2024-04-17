<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContribuyenteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\UnidadController;

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
    return view('principal');
});

/*Mostrar */
Route::get('/actividad', [ActividadController::class, 'index'])->name('actividad');

/*crear */
Route::get('/actividad/crear', [ActividadController::class, 'create'])->name('actividad.create');

/*GUARDAR */
Route::post('/actividad', [ActividadController::class, 'store'])->name('actividad.store');

/*SHOW */
Route::get('/actividad/{id}/ver', [ActividadController::class, 'show'])->name('actividad.show');

/*DELETE */
Route::delete('/actividad/{id}', [ActividadController::class, 'destroy'])->name('actividad.destroy');

/*EDITAR */
Route::get('/actividad/{id}/editar', [ActividadController::class, 'edit'])->name('actividad.edit');

/*UPDATE */
Route::put('/actividad/{id}', [ActividadController::class, 'update'])->name('actividad.update');


/*Mostrar */
Route::get('/unidad', [UnidadController::class, 'index'])->name('unidad');

/*crear */
Route::get('/unidad/crear', [UnidadController::class, 'create'])->name('unidad.create');

/*GUARDAR */
Route::post('/unidad', [UnidadController::class, 'store'])->name('unidad.store');

/*SHOW */
Route::get('/unidad/{id}/ver', [UnidadController::class, 'show'])->name('unidad.show');

/*DELETE */
Route::delete('/unidad/{id}', [UnidadController::class, 'destroy'])->name('unidad.destroy');

/*EDITAR */
Route::get('/unidad/{id}/editar', [UnidadController::class, 'edit'])->name('unidad.edit');

/*UPDATE */
Route::put('/unidad/{id}', [UnidadController::class, 'update'])->name('unidad.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

