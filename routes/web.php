<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

Route::get('/', function () {
    return view('home');
});

//formulario para crear equipo

Route::get('/equipos/create', [EquipoController::class, 'create']);

Route::post('/equipo', [EquipoController::class, 'store']);

Route::get('/equipos/index', [EquipoController::class, 'index']);