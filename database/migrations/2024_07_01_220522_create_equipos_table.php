<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario', 30)->unique();
            $table->string('nombre', 50)->unique();
            $table->string('mail', 30)->unique();
            $table->string('contrasena');
            $table->date('fecha_fundacion')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('puntos')->default(0);
            $table->integer('partidos_jugados')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
};