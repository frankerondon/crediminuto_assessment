<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas de productos
Route::resource('products', ProductController::class);

// Rutas de facturas 
Route::resource('invoices', InvoiceController::class);

// Rutas de clientes
Route::resource('clients', ClientController::class);
Route::resource('users', ClientController::class);