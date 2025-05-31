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
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id_usuario')->primary();
            $table->string('nombre');
            $table->string('rs_apellido');
            $table->string('email')->unique();
            $table->string('rif_cedula')->unique();
            $table->string('telefono');
            $table->enum('tipo_usuario', ['Juridico', 'Natural', 'Mixto']);
            $table->enum('estado', ['activo', 'inactivo', 'revision']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        
    }
};
