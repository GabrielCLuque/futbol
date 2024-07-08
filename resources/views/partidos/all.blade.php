<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próximos Partidos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
    <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <div class="grid grid-cols-3 gap-4 mb-4 bg-blue-100">
            @foreach($partidos as $partido)
                <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800 p-4">
                    <div class="text-center">
                        <p class="text-xl text-gray-400 dark:text-gray-500">
                            {{ $partido->equipoLocal->nombre_equipo ?? 'Desconocido' }} vs {{ $partido->equipoVisitante->nombre_equipo ?? 'Desconocido' }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $partido->fecha->format('d M Y, H:i') }}
                        </p>
                    </div>
                    <div class="flex space-x-2 mt-2">
                        <a href="{{ route('partidos.edit', $partido->id) }}" class="px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">Editar</a>
                        <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
