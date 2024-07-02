<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//formulario para crear equipo

Route::get('/equipo/equipo_create', [EquipoController::class, 'create']);

Route::post('/equipo', [EquipoController::class, 'store']);