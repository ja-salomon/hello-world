<?php

use Illuminate\Support\Facades\Route;
use App\Models\Empleado;
use App\Http\Controllers\EmpleadoController;


Route::get('/', function () {
    return "Holaaa Laravel";
    //return view('welcome');
});

Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.listing');
Route::get('/empleado/create', [EmpleadoController::class, 'create'])->name('empleado.create');
Route::post('/empleado/store', [EmpleadoController::class, 'store'])->name('empleado.store');
Route::get('/empleado/show/{id}', [EmpleadoController::class, 'show'])->name('empleado.show');
Route::get('/empleado/edit/{id}', [EmpleadoController::class, 'edit'])->name('empleado.edit');
Route::get('/empleado/destroy/{id}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');
Route::put('/empleado/update/{id}', [EmpleadoController::class, 'update'])->name('empleado.update');
