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
        Schema::create('playas', function (Blueprint $table) {
            $table->unsignedInteger('id_playa')->autoIncrement();
            $table->string('nombre_playa', 25); 
            $table->string('latitud',10);
            $table->string('longitud',10);
            $table->unsignedInteger('fk_municipio');
            $table->foreign('fk_municipio')->references('id_municipio')->on('municipios');
            $table->unsignedInteger('fk_region');
            $table->foreign('fk_region')->references('id_region')->on('regiones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playas');
    }
};
