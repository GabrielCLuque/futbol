<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil del Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-6">Editar Perfil del Equipo</h1>
        <form action="<?php echo e(route('dashboard.update', $user->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>  <!-- Usar PUT como método de solicitud para la actualización -->

            <div class="mb-4">
                <label for="nombre_equipo" class="block text-sm font-medium text-gray-700">Nombre del Equipo:</label>
                <input type="text" name="nombre_equipo" id="nombre_equipo" value="<?php echo e(old('nombre_equipo', $user->nombre_equipo)); ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva Contraseña:</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            
            <div class="mb-4">
                <label for="fecha_fundacion" class="block text-sm font-medium text-gray-700">Fecha de Fundación:</label>
                <input type="date" name="fecha_fundacion" id="fecha_fundacion" value="<?php echo e(old('fecha_fundacion', $user->fecha_fundacion)); ?>" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            
            <div class="mb-4">
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="<?php echo e(old('direccion', $user->direccion)); ?>" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Guardar Cambios
            </button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/dashboard/edit.blade.php ENDPATH**/ ?>