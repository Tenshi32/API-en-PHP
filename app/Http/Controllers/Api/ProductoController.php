<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Ejemplo de datos de productos
        $productos = [
            ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 100],
            ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 200],
        ];

        return response()->json($productos);
    }
}
