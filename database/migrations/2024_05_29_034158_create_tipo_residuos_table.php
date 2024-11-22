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
        Schema::create('tipo_residuos', function (Blueprint $table) {
            $table->unsignedInteger('id_tipo')->autoIncrement();
            $table->string('nombre_tipo', 100); 
            $table->unsignedInteger('fk_clasificacion');
            $table->foreign('fk_clasificacion')->references('id_clasificacion')->on('clasificaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_residuos');
    }
};
