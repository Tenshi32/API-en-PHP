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
        Schema::create('unidad_medidas', function (Blueprint $table) {
            $table->integerIncrements('id_unidad_medida');
            $table->string("unidad_medida");
            $table->string("simbologia");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_medidas');
    }
};
