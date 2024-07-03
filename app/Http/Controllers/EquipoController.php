<?php

namespace App\Http\Controllers;

use App\Models\equipos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'nombre_usuario' => 'required|string|max:30|unique:equipos',
            'nombre' => 'required|string|max:50|unique:equipos',
            'mail' => 'required|string|email|max:30|unique:equipos',
            'contrasena' => 'required|string|max:30',
            'fecha_fundacion' => 'nullable|date',
            'direccion' => 'nullable|string',
        ]);
    
        $equipo = new equipos();
        $equipo->nombre_usuario = $validatedData['nombre_usuario'];
        $equipo->nombre = $validatedData['nombre'];
        $equipo->mail = $validatedData['mail'];
        $equipo->contrasena = bcrypt($validatedData['contrasena']); 
        $equipo->fecha_fundacion = $validatedData['fecha_fundacion'];
        $equipo->direccion = $validatedData['direccion'];
        $equipo->puntos = 0; 
        $equipo->partidos_jugados = 0; 


        $equipo->save();
    
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
