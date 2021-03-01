<?php

use App\Models\servicio;
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
    $Servicios=servicio::all();
    return view('welcome', compact('Servicios'));
});

Route::view('navegacion', 'Nav')->name('navegacion');

Route::resource('Servicios', App\Http\Controllers\servicioCtrl::class);
Route::resource('Equipos', App\Http\Controllers\equipoCtrl::class);
Route::resource('Insumos', App\Http\Controllers\insumoCtrl::class);
Route::resource('Citas', App\Http\Controllers\citaCtrl::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('Roles1804', App\Http\Controllers\RoleUserCtrl::class);