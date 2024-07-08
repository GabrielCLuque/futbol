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
    
<a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <h1 class="text-2xl font-bold mb-4">Usuarios</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full bg-white rounded shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">ID</th>
                    <th class="p-2">Nombre de Usuario</th>
                    <th class="p-2">Nombre del Equipo</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Puntos</th>
                    <th class="p-2">Partidos Jugados</th>
                    <th class="p-2">Admin</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="p-2">{{ $user->id }}</td>
                        <td class="p-2">{{ $user->username }}</td>
                        <td class="p-2">{{ $user->nombre_equipo }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">{{ $user->puntos }}</td>
                        <td class="p-2">{{ $user->partidos_jugados }}</td>
                        <td class="p-2">{{ $user->admin_status ? 'Sí' : 'No' }}</td>
                        <td class="p-2">
                            <a href="{{ route('dashboard.editone', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body> 
</html>