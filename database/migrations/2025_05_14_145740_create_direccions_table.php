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
        Schema::create('direccions', function (Blueprint $table) {
            $table->bigIncrements('id_direccion');

            $table->foreignId('id_usuario')->references('id_usuario')->on('users')->onDelete('set null');
            $table->index('id_usuario');

            $table->string('descripcion');
            $table->integer('municipio')->index();
            $table->integer('parroquia')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccions');
    }
};
