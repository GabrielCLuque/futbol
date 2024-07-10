<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
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
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="container mx-auto max-w-lg bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Crear Nuevo Equipo</h1>
        
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/equipo" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4 place-items-center">
                <div class="form-group w-full">
                    <label for="nombre_equipo" class="block mb-2 text-lg font-semibold text-center">Nombre del club</label>
                    <input type="text" name="nombre_equipo" id="nombre_equipo" class="form-control w-full p-2 border rounded @error('nombre_equipo') border-red-500 @enderror" value="{{ old('nombre_equipo') }}" required>
                    @error('nombre_equipo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group w-full">
                    <label for="username" class="block mb-2 text-lg font-semibold text-center">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" class="form-control w-full p-2 border rounded @error('username') border-red-500 @enderror" value="{{ old('username') }}" required>
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group w-full">
                    <label for="email" class="block mb-2 text-lg font-semibold text-center">Email</label>
                    <input type="email" name="email" id="email" class="form-control w-full p-2 border rounded @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group w-full">
                    <label for="password" class="block mb-2 text-lg font-semibold text-center">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control w-full p-2 border rounded @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group w-full">
                    <label for="fecha_fundacion" class="block mb-2 text-lg font-semibold text-center">Fecha de Fundación</label>
                    <input type="date" name="fecha_fundacion" id="fecha_fundacion" class="form-control w-full p-2 border rounded" value="{{ old('fecha_fundacion') }}">
                </div>
                <div class="form-group w-full">
                    <label for="direccion" class="block mb-2 text-lg font-semibold text-center">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control w-full p-2 border rounded" value="{{ old('direccion') }}">
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Crear Equipo</button>
            </div>
        </form>
        <div class="flex justify-center mt-4">
            <a href="/" class="volver-button flex items-center text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        </div>
    </div>
</body>
</html>
