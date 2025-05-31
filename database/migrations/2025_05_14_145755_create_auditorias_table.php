<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->bigIncrements('id_auditoria');
            $table->foreignId('id_usuario')->references('id_usuario')->on('users')->onDelete('set null');
            $table->index('id_usuario');
            $table->string('accion', 45)->nullable();
            $table->string('descripcion', 100)->nullable();
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
