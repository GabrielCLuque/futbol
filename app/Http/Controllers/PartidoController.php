<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartidoController extends Controller
{
    public function create()
    {
        if (!Auth::check() || Auth::user()->admin_status != 1) {
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta página.');
        }

        $equipos = User::select('id', 'nombre_equipo')->get(); 

        return view('partidos.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_equipo_local' => 'required|exists:users,id',
            'id_equipo_visitante' => 'required|exists:users,id',
            'fecha' => 'required|date',
        ]);

        // Logica para guardar el partido
        $partido = new Partido();
        $partido->id_equipo_local = $request->id_equipo_local;
        $partido->id_equipo_visitante = $request->id_equipo_visitante;
        $partido->fecha = $request->fecha;
        $partido->save();

        return redirect('/')->with('success', 'Partido creado con éxito');
    }
}
