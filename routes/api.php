<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController; // ¡Importa tu controlador!

Route::apiResource('productos', ProductController::class);