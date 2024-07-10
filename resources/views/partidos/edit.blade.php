<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Partido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        td, th {
            text-align: center;
        }
        .volver-button {
            padding: 1rem 2rem;
            font-size: 1.25rem;
            transition: background-color 0.3s;
        }
        .volver-button:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="container mx-auto mt-8">
         
    @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="id_equipo_local" class="block text-sm font-bold mb-2">Equipo Local:</label>
                <select name="id_equipo_local" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $usuario->id == $partido->id_equipo_local ? 'selected' : '' }}>{{ $usuario->nombre_equipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="id_equipo_visitante" class="block text-sm font-bold mb-2">Equipo Visitante:</label>
                <select name="id_equipo_visitante" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $usuario->id == $partido->id_equipo_visitante ? 'selected' : '' }}>{{ $usuario->nombre_equipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="fecha" class="block text-sm font-bold mb-2">Fecha del Partido:</label>
                <input type="datetime-local" name="fecha" value="{{ $partido->fecha->format('Y-m-d\TH:i') }}" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-4">
                <label for="jugado" class="block text-sm font-bold mb-2">Jugado:</label>
                <select name="jugado" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="0" {{ !$partido->jugado ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $partido->jugado ? 'selected' : '' }}>Sí</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="resultado" class="block text-sm font-bold mb-2">Resultado (opcional):</label>
                <input type="text" name="resultado" value="{{ $partido->resultado ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Guardar Cambios</button>
        </form>
        <div class="flex justify-start mt-4">
            <a href="{{ route('partidos.all') }}" class="volver-button flex items-center text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver a la lista de partidos</a>
        </div>
    </div>
</body>
</html>
