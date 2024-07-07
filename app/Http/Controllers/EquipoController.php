<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $nombre_equipo = User::pluck('nombre_equipo');
        $puntos = User::pluck('puntos');
        $partidos_jugados = User::pluck('partidos_jugados');

        return view('equipos.index',['nombre_equipo' => $nombre_equipo, 'puntos' => $puntos, 'partidos_jugados' => $partidos_jugados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_equipo' => 'required|string|max:30|unique:users',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:30|unique:users',
            'password' => 'required|string|max:30',
            'fecha_fundacion' => 'nullable|date',
            'direccion' => 'nullable|string',
            'admin_status'=> 'boolean',
        ]);
    
        $user = new User();
        $user->nombre_equipo = $validatedData['nombre_equipo'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); 
        $user->fecha_fundacion = $validatedData['fecha_fundacion'];
        $user->direccion = $validatedData['direccion'];
        $user->puntos = 0; 
        $user->partidos_jugados = 0; 
        $user->admin_status = 0; 

        $user->save();
    
        return view('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
