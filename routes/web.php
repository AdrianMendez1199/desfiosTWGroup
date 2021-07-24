<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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


// Desafio 1 y 3
Route::get('/products/{id}', [ProductController::class, 'getTotalPriceByInvoice']);
Route::get('/invoice', [ProductController::class, 'getInvoiceByPrice']);
Route::get('/getAllProductNameByPrice', [ProductController::class, 'getAllProductNameByPrice']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
