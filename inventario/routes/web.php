<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\VEquipoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\MobiliarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ElectrodomesticoController;
use App\Http\Controllers\UsuarioController;
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

Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('personal.index');
    });

    Route::get('personal',[PersonalController::class,'index'])->name('personal.index');
    Route::post('personal',[PersonalController::class,'registrar'])->name('personal.registrar');
    Route::get('personal/eliminar/{per_id}',[PersonalController::class,'eliminar'])->name('personal.eliminar');
    Route::get('personal/editar/{per_id}',[PersonalController::class,'editar'])->name('personal.editar');
    Route::post('personal/actualizar',[PersonalController::class,'actualizar'])->name('personal.actualizar');

    Route::get('vequipo',[VEquipoController::class,'index'])->name('vequipo.index');
    Route::post('vequipo/buscarpersonal', [VEquipoController::class, 'buscarpersonal'])->name('vequipo.buscarpersonal');
    Route::post('vequipo/buscarnombre', [VEquipoController::class, 'buscarnombre'])->name('vequipo.buscarnombre');
    Route::post('vequipo', [VEquipoController::class, 'registrar'])->name('vequipo.registrar');
    Route::get('vequipo/eliminar/{mov_id}', [VEquipoController::class, 'eliminar'])->name('vequipo.eliminar');
    Route::get('vequipo/editar/{mov_id}', [VEquipoController::class, 'editar'])->name('vequipo.editar');
    Route::post('vequipo/actualizar', [VEquipoController::class, 'actualizar'])->name('vequipo.actualizar');
    //Route::get('vequipo/personal', [VEquipoController::class, 'personal'])->name('vequipo.personal');

    Route::get('equipo',[EquipoController::class,'index'])->name('equipo.index');
    Route::post('equipo',[EquipoController::class,'registrar'])->name('equipo.registrar');
    Route::get('equipo/eliminar/{pat_id}',[EquipoController::class,'eliminar'])->name('equipo.eliminar');
    Route::get('equipo/editar/{pat_id}',[EquipoController::class,'editar'])->name('equipo.editar');
    Route::post('equipo/actualizar',[EquipoController::class,'actualizar'])->name('equipo.actualizar');

    Route::get('mobiliario',[MobiliarioController::class,'index'])->name('mobiliario.index');
    Route::post('mobiliario',[MobiliarioController::class,'registrar'])->name('mobiliario.registrar');
    Route::get('mobiliario/eliminar/{pat_id}',[MobiliarioController::class,'eliminar'])->name('mobiliario.eliminar');
    Route::get('mobiliario/editar/{pat_id}',[MobiliarioController::class,'editar'])->name('mobiliario.editar');
    Route::post('mobiliario/actualizar',[MobiliarioController::class,'actualizar'])->name('mobiliario.actualizar');

    Route::get('vehiculo',[VehiculoController::class,'index'])->name('vehiculo.index');
    Route::post('vehiculo',[VehiculoController::class,'registrar'])->name('vehiculo.registrar');
    Route::get('vehiculo/eliminar/{pat_id}',[VehiculoController::class,'eliminar'])->name('vehiculo.eliminar');
    Route::get('vehiculo/editar/{pat_id}',[VehiculoController::class,'editar'])->name('vehiculo.editar');
    Route::post('vehiculo/actualizar',[VehiculoController::class,'actualizar'])->name('vehiculo.actualizar');

    Route::get('electrodomestico',[ElectrodomesticoController::class,'index'])->name('electrodomestico.index');
    Route::post('electrodomestico',[ElectrodomesticoController::class,'registrar'])->name('electrodomestico.registrar');
    Route::get('electrodomestico/eliminar/{pat_id}',[ElectrodomesticoController::class,'eliminar'])->name('electrodomestico.eliminar');
    Route::get('electrodomestico/editar/{pat_id}',[ElectrodomesticoController::class,'editar'])->name('electrodomestico.editar');
    Route::post('electrodomestico/actualizar',[ElectrodomesticoController::class,'actualizar'])->name('electrodomestico.actualizar');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

