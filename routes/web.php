<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//formulario para crear equipo

Route::get('/futbol/equipocreate', [EquipoController::class, 'create']);

Route::post('/futbol', [EquipoController::class, 'store']);