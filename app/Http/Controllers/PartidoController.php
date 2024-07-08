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

        $partido = new Partido();
        $partido->id_equipo_local = $request->id_equipo_local;
        $partido->id_equipo_visitante = $request->id_equipo_visitante;
        $partido->fecha = $request->fecha;
        $partido->save();

        return redirect('/')->with('success', 'Partido creado con éxito');
    }
    public function show()
    {
        
        $partidos = Partido::where('jugado', 0)
                           ->orderBy('fecha', 'asc')  
                           ->get();

        return view('partidos.index', ['partidos' => $partidos]);
    }
    public function allPartidos()
    {
        
        if (Auth::check() && Auth::user()->admin_status == 1) {
            $partidos = Partido::orderBy('fecha', 'asc')->get(); 
            return view('partidos.all', ['partidos' => $partidos]);
        } else {
            return redirect('/')->with('error', 'Acceso denegado.');
        }
    }
   
public function edit($id)
{
    if (Auth::check() && Auth::user()->admin_status == 1) {
        $partido = Partido::findOrFail($id);
        $usuarios = User::where('admin_status', 0)->get(); 
        return view('partidos.edit', compact('partido', 'usuarios'));
    } else {
        return redirect('/')->with('error', 'No autorizado para realizar esta acción.');
    }
}

public function update(Request $request, $id)
{
    if (Auth::check() && Auth::user()->admin_status == 1) {
        $this->validateAndUpdatePartido($request, $id);
        return $this->redirectToEditView($id);
    } else {
        return redirect('/')->with('error', 'No autorizado para realizar esta acción.');
    }
}

private function validateAndUpdatePartido(Request $request, $id)
{
    $request->validate([
        'id_equipo_local' => 'required|integer|exists:users,id',
        'id_equipo_visitante' => 'required|integer|exists:users,id',
        'fecha' => 'required|date',
        'jugado' => 'required|boolean',
        'resultado' => 'nullable|string',
    ]);

    $partido = Partido::findOrFail($id);
    $partido->id_equipo_local = $request->id_equipo_local;
    $partido->id_equipo_visitante = $request->id_equipo_visitante;
    $partido->fecha = $request->fecha;
    $partido->jugado = $request->jugado;
    $partido->resultado = $request->resultado;
    $partido->save();
}

private function redirectToEditView($id)
{
    return redirect()->route('partidos.all', $id)->with('success', 'Partido actualizado correctamente.');
}
    public function destroy($id)
{
    if (Auth::check() && Auth::user()->admin_status == 1) {
        $partido = Partido::findOrFail($id);
        $partido->delete();

        return redirect('/partidos/all')->with('success', 'Partido eliminado correctamente.');
    } else {
        return redirect('/')->with('error', 'No autorizado para realizar esta acción.');
    }
}
}
