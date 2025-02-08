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
        Schema::create('hallazgos', function (Blueprint $table) {
            $table->unsignedInteger('id_hallazgo')->autoIncrement();
            $table->unsignedInteger('fk_tipo');
            $table->foreign('fk_tipo')->references('id_tipo')->on('tipo_residuos');
            $table->unsignedInteger('fk_muestreo');
            $table->foreign('fk_muestreo')->references('id_muestreo')->on('muestreos');
            $table->unsignedInteger('cantidad');
            $table->float('porcentaje',5,2);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hallazgos');
    }
};
