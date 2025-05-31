<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigInteger('id_producto')->primary();

            $table->foreignId("id_categoria")->references("id_categoria")->on("categoria");
            $table->index("id_categoria");

            $table->foreignId("id_unidad_medida")->references("id_unidad_medida")->on("unidad_medida");
            $table->index("id_unidad_medida");

            $table->foreignId("id_usuario")->references("id_usuario")->on("users");
            $table->index("id_usuario");

            $table->string("nombre_producto");
            $table->string("descripcion_producto");
            $table->integer("stock_producto");
            $table->float("precio_producto");
            $table->date("fecha_creacion");
            $table->enum('estado', ['activo', 'inactivo', 'revision']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
