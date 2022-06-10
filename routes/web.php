<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EquiposController;
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
    return view('welcome');
});
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios');
Route::get('/usuarios/{id}', [UsuariosController::class, 'show'])->name('usuarios-edit');
Route::patch('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios-update');
Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios-destroy');
Route::resource('equipos', EquiposController:: class);