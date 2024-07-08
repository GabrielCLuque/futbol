<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Partido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
        <a href="{{ route('partidos.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver a la lista de partidos</a>
        <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="equipo_local_id" class="block text-sm font-bold mb-2">Equipo Local:</label>
                <select name="equipo_local_id" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $usuario->id == $partido->equipo_local_id ? 'selected' : '' }}>{{ $usuario->nombre_equipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="equipo_visitante_id" class="block text-sm font-bold mb-2">Equipo Visitante:</label>
                <select name="equipo_visitante_id" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $usuario->id == $partido->equipo_visitante_id ? 'selected' : '' }}>{{ $usuario->nombre_equipo }}</option>
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
    </div>
</body>
</html>
