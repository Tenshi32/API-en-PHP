<?php

use App\Http\Controllers\Api\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/productos', [ProductoController::class, 'index']); // Ruta para obtener todos los productos
Route::post('/productos', [ProductoController::class, 'store']); // Ruta para crear un nuevo producto
Route::get('/productos/{id}', [ProductoController::class, 'show']); // Ruta para obtener un producto específico
Route::put('/productos/{id}', [ProductoController::class, 'update']); // Ruta para actualizar un producto
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']); // Ruta para eliminar un producto