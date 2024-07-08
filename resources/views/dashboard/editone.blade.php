<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Partido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container mx-auto p-4">
    
<a href="{{ route('dashboard.editall') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.updatetarget', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="username" class="block text-gray-700">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" class="border p-2 w-full" value="{{ old('username', $user->username) }}" required>
            </div>

            <div class="mb-4">
                <label for="nombre_equipo" class="block text-gray-700">Nombre del Equipo:</label>
                <input type="text" id="nombre_equipo" name="nombre_equipo" class="border p-2 w-full" value="{{ old('nombre_equipo', $user->nombre_equipo) }}" required>
            </div>

            <div class="mb-4">
                <label for="puntos" class="block text-gray-700">Puntos:</label>
                <input type="number" id="puntos" name="puntos" class="border p-2 w-full" value="{{ old('puntos', $user->puntos) }}" required>
            </div>

            <div class="mb-4">
                <label for="partidos_jugados" class="block text-gray-700">Partidos Jugados:</label>
                <input type="number" id="partidos_jugados" name="partidos_jugados" class="border p-2 w-full" value="{{ old('partidos_jugados', $user->partidos_jugados) }}" required>
            </div>

            <div class="mb-4">
                <label for="fecha_fundacion" class="block text-gray-700">Fecha de Fundación:</label>
                <input type="date" id="fecha_fundacion" name="fecha_fundacion" class="border p-2 w-full" value="{{ old('fecha_fundacion', $user->fecha_fundacion) }}">
            </div>

            <div class="mb-4">
                <label for="direccion" class="block text-gray-700">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="border p-2 w-full" value="{{ old('direccion', $user->direccion) }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>

</body> 
</html>