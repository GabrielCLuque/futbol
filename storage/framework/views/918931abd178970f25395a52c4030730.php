<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Partido</title>
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
        <h1 class="text-xl font-bold mb-4">Crear un Nuevo Partido</h1>
        <form action="<?php echo e(route('partidos.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="id_equipo_local">Equipo Local:</label>
                <select id="id_equipo_local" name="id_equipo_local" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <?php $__currentLoopData = $equipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($equipo->id); ?>"><?php echo e($equipo->nombre_equipo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="id_equipo_visitante">Equipo Visitante:</label>
                <select id="id_equipo_visitante" name="id_equipo_visitante" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <?php $__currentLoopData = $equipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($equipo->id); ?>"><?php echo e($equipo->nombre_equipo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="fecha">Fecha del Partido:</label>
                <input type="datetime-local" id="fecha" name="fecha" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar Partido
            </button>
        </form>
        <div class="flex justify-start mt-4">
            <a href="/" class="volver-button flex items-center text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/partidos/create.blade.php ENDPATH**/ ?>