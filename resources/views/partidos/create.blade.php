<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Partido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
    <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <h1 class="text-xl font-bold mb-4">Crear un Nuevo Partido</h1>
        <form action="{{ route('partidos.store') }}" method="POST">
            @csrf
            <div>
                <label for="id_equipo_local">Equipo Local:</label>
                <select id="id_equipo_local" name="id_equipo_local" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_equipo_visitante">Equipo Visitante:</label>
                <select id="id_equipo_visitante" name="id_equipo_visitante" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="fecha">Fecha del Partido:</label>
                <input type="datetime-local" id="fecha" name="fecha" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar Partido
            </button>
        </form>
    </div>
</body>
</html>
