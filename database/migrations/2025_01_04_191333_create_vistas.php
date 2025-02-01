<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vistas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();
        });
        DB::table('vistas')->insert([
            'id' =>1,
            'title' => 'Página de Inicio',
            'views' => 0, // Inicializar el contador de visitas en 0
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vistas');
    }
};
