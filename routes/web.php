<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
}) -> name('home');


Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);


//todo Rutas para el correo

Route::get('contacto',[ContactoController::class , 'pintarFormulario']) -> name('mail.pintar');
Route::post('contacto',[ContactoController::class , 'procesarFormulario']) -> name('mail.enviar');



