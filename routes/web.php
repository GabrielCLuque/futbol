<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\HomeController;
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


Route::get('/partidos/create', [PartidoController::class, 'create'])->middleware('auth')->name('partidos.create');
     
Route::post('/partidos', [PartidoController::class, 'store'])->middleware('auth')->name('partidos.store');

Route::get('/partidos/index', [PartidoController::class, 'show'])->name('partidos.index');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/partidos/all', [PartidoController::class, 'allPartidos'])->name('partidos.all')->middleware('auth');

Route::get('/partidos/edit/{id}', [PartidoController::class, 'edit'])->name('partidos.edit')->middleware('auth');

Route::put('/partidos/update/{id}', [PartidoController::class, 'update'])->name('partidos.update')->middleware('auth');

Route::delete('/partidos/destroy/{id}', [PartidoController::class, 'destroy'])->name('partidos.destroy')->middleware('auth');

Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard/editall', [EquipoController::class, 'adminindex'])->name('dashboard.editall');
    Route::get('/dashboard/editone/{id}', [EquipoController::class, 'adminedit'])->name('dashboard.editone');
    Route::put('/dashboard/editone/{id}', [EquipoController::class, 'adminupdatetarget'])->name('dashboard.updatetarget');
});

