<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próximos Partidos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        
        .volver-button {
            padding: 1rem 2rem; 
            font-size: 1.25rem; 
            transition: background-color 0.3s;
            border-radius: 0.5rem; 
            margin-top: 20px;
            display: inline-block;
        }
        .volver-button:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="vertical-background">
        <div class="container mx-auto mt-8">
            <div class="grid grid-cols-3 gap-4 mb-4">
                @foreach($partidos as $partido)
                    @if(!$partido->jugado)  
                        <div class="flex items-center justify-center h-24 bg-gray-50 dark:bg-gray-800">
                            <div class="text-center">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">
                                    {{ $partido->equipoLocal->nombre_equipo ?? 'Desconocido' }} vs {{ $partido->equipoVisitante->nombre_equipo ?? 'Desconocido' }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $partido->fecha->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <a href="/" class="volver-button flex items-center text-gray-900 bg-white dark:text-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        </div>
    </div>
</body>
</html>
