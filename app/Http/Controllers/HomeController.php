<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

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

        return view('home', compact('proximosPartidos', 'resultadosPartidos'));
    }
}