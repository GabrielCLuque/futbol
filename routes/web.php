<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Auth\Events\Login;

Route::get('/', function () {
    return view('home');
});

//formulario para crear equipo

Route::get('/equipos/create', [EquipoController::class, 'create']);

Route::post('/equipo', [EquipoController::class, 'store']);

Route::get('/equipos/index', [EquipoController::class, 'index']);

Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');


Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');

Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

Route::middleware('auth:web')->get('/dashboard', function () {
    return view('/dashboard');
});

Route::middleware('auth:web')->get('/dashboard/update', function () {
    return view('/dashboard/update');
});

Route::get('/dashboard/edit', [EquipoController::class, 'edit'])->name('dashboard.edit');


Route::put('/dashboard/update/{id}', [EquipoController::class, 'update'])->name('dashboard.update');


Route::delete('/dashboard/destroy/{id}', [EquipoController::class, 'destroy'])->name('dashboard.destroy');

Route::delete('/equipos/destroy-target/{id}', [EquipoController::class, 'destroyTarget'])
     ->name('equipos.destroy-target')
     ->middleware('auth');