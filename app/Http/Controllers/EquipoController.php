<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('admin_status', '!=', 1)->get(['id', 'nombre_equipo', 'puntos', 'partidos_jugados']);

        return view('equipos.index', [
            'users' => $users
        ]);
    }

    //Index to make posible the editall view
    public function adminindex()
    {
        $users = User::all(['id', 'nombre_equipo', 'username', 'puntos', 'partidos_jugados', 'email', 'fecha_fundacion', 'direccion', 'admin_status']);

        return view('dashboard.editall', [
            'users' => $users
        ]);
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
        public function edit()
    {
        $user = Auth::user(); 
        $userId = $user->id;  
        return view('dashboard.edit', compact('user', 'userId'));
    }

    //same as adminindex
   
    public function adminedit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.editone', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
   
        public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nombre_equipo' => 'required|string|max:30',
            'email' => 'required|string|email|max:30',
            'password' => 'required|string|max:30',
            'fecha_fundacion' => 'nullable|date',
            'direccion' => 'nullable|string',
        ]);

        
        if (User::where('nombre_equipo', $validatedData['nombre_equipo'])->where('id', '!=', $id)->exists()) {
            return redirect()->back()->withErrors(['nombre_equipo' => 'El nombre del equipo ya está en uso por otro usuario.']);
        }

        
        if (User::where('email', $validatedData['email'])->where('id', '!=', $id)->exists()) {
            return redirect()->back()->withErrors(['email' => 'El email ya está en uso por otro usuario.']);
        }

        $user->nombre_equipo = $validatedData['nombre_equipo'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); 
        $user->fecha_fundacion = $validatedData['fecha_fundacion'];
        $user->direccion = $validatedData['direccion'];

        $user->save();

        return redirect('/')->with('success', 'Perfil actualizado correctamente.');
    }

    public function adminupdatetarget(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'username' => 'required|string|max:30',
            'nombre_equipo' => 'required|string|max:30',
            'puntos' => 'required|integer',
            'partidos_jugados' => 'required|integer',
            'fecha_fundacion' => 'nullable|date',
            'direccion' => 'nullable|string',
        ]);
        
        if (User::where('nombre_equipo', $validatedData['nombre_equipo'])->where('id', '!=', $id)->exists()) {
            return redirect()->back()->withErrors(['nombre_equipo' => 'El nombre del equipo ya está en uso por otro usuario.']);
        }
        
        $user->username = $validatedData['username'];
        $user->nombre_equipo = $validatedData['nombre_equipo'];
        $user->puntos = $validatedData['puntos'];
        $user->partidos_jugados = $validatedData['partidos_jugados'];
        $user->fecha_fundacion = $validatedData['fecha_fundacion'];
        $user->direccion = $validatedData['direccion'];

        $user->save();

        return redirect()->route('dashboard.editall')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            Auth::logout();
            return redirect('/')->with('success', 'Perfil eliminado correctamente.');
        }

        return redirect('/dashboard')->with('error', 'No se pudo eliminar el perfil.');
    }
    public function destroyTarget($id)
    {
        if (Auth::user()->admin_status == 1) {
            $user = User::findOrFail($id); 
            $user->delete(); 
            return redirect('/equipos/index')->with('success', 'Usuario eliminado correctamente.');
        }
        return redirect('/equipos/index')->with('error', 'No tiene permisos para realizar esta acción.');
    }
}
