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
        Schema::create('seguridads', function (Blueprint $table) {
            $table->bigIncrements('id_seguridad');

            $table->foreignId('id_usuario')->references('id_usuario')->on('users')->onDelete('set null');
            $table->index('id_usuario');

            $table->foreignId('id_pregunta')->references('id_pregunta')->on('pregunta')->onDelete('set null');
            $table->index('id_pregunta');

            $table->string('password', 256)->nullable();
            $table->integer('cont_fail')->nullable();
            $table->boolean('remember')->default(false);
            $table->string('path_picture', 200)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguridads');
    }
};
