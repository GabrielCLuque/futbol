<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Muestra la página de inicio con los tres próximos partidos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Próximos partidos no jugados
        $proximosPartidos = Partido::where('jugado', false)
                                   ->orderBy('fecha', 'asc')
                                   ->take(3)
                                   ->get();

        // Partidos jugados, ordenados por fecha reciente
        $resultadosPartidos = Partido::where('jugado', true)
                                     ->orderBy('fecha', 'asc')
                                     ->get();

        $users = User::where('admin_status', '!=', 1)
                                    ->orderBy('puntos', 'desc')
                                     ->take(3)
                                     ->get(['id', 'nombre_equipo', 'puntos', 'partidos_jugados']);
                
        return view('home', compact('proximosPartidos', 'resultadosPartidos', 'users'));
    }
   
}