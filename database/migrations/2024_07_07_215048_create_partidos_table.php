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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_equipo_local');
            $table->unsignedBigInteger('id_equipo_visitante');
            $table->boolean('jugado')->default(false);
            $table->char('resultado')->nullable();
            $table->datetime('fecha');

            $table->timestamps();

           
            $table->foreign('id_equipo_local')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_equipo_visitante')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
