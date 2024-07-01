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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario', 30)->unique();
            $table->string('nombre', 50)->unique();
            $table->string('mail', 30)->unique();
            $table->string('contrasena', 30);
            $table->date('fecha_fundacion')->nullable();
            $table->text('direccion')->nullable();
            $table->integer('puntos')->default(0);
            $table->integer('partidos_jugados')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
