<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product; // Importa tu modelo Product
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Para manejar errores de validación

class ProductController extends Controller
{
    /**
     * Muestra una lista de recursos.
     */
    public function index()
    {
        $products = Product::all(); // Obtiene todos los productos
        return response()->json($products); // Devuelve los productos como JSON
    }

    /**
     * Almacena un nuevo recurso.
     */
    public function store(Request $request)
    {
        try {
            // Reglas de validación
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
            ]);

            $product = Product::create($request->all());
            return response()->json($product, 201); // 201 Created
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $e->errors()
            ], 422); // 422 Unprocessable Entity
        }
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(string $id)
    {
        $product = Product::find($id); // Busca el producto por ID

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404); // 404 Not Found
        }

        return response()->json($product);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        try {
            $request->validate([
                'name' => 'sometimes|required|string|max:255', // 'sometimes' para que no sea requerido si no se envía
                'description' => 'nullable|string',
                'price' => 'sometimes|required|numeric|min:0',
                'stock' => 'sometimes|required|integer|min:0',
            ]);

            $product->update($request->all());
            return response()->json($product);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(null, 204); // 204 No Content
    }
}