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
        Schema::create('muestreos', function (Blueprint $table) {
            $table->unsignedInteger('id_muestreo')->autoIncrement();
            $table->integer('num_muestreo');
            $table->string('zona',45);
            $table->string('dia',10); #Representa el dia de la semana
            $table->unsignedInteger('anio');
            $table->date('fecha')->nullable();
            $table->unsignedInteger('fk_playa');
            $table->foreign('fk_playa')->references('id_playa')->on('playas');
            $table->unsignedBigInteger('fk_capturista');
            $table->foreign('fk_capturista')->references('id')->on('users');
            $table->boolean('autorizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muestreos');
    }
};
