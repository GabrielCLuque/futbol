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
        <a href="<?php echo e(route('partidos.all')); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver a la lista de partidos</a>
        <form action="<?php echo e(route('partidos.update', $partido->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-4">
                <label for="id_equipo_local" class="block text-sm font-bold mb-2">Equipo Local:</label>
                <select name="id_equipo_local" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($usuario->id); ?>" <?php echo e($usuario->id == $partido->id_equipo_local ? 'selected' : ''); ?>><?php echo e($usuario->nombre_equipo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="id_equipo_visitante" class="block text-sm font-bold mb-2">Equipo Visitante:</label>
                <select name="id_equipo_visitante" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($usuario->id); ?>" <?php echo e($usuario->id == $partido->id_equipo_visitante ? 'selected' : ''); ?>><?php echo e($usuario->nombre_equipo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="fecha" class="block text-sm font-bold mb-2">Fecha del Partido:</label>
                <input type="datetime-local" name="fecha" value="<?php echo e($partido->fecha->format('Y-m-d\TH:i')); ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-4">
                <label for="jugado" class="block text-sm font-bold mb-2">Jugado:</label>
                <select name="jugado" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="0" <?php echo e(!$partido->jugado ? 'selected' : ''); ?>>No</option>
                    <option value="1" <?php echo e($partido->jugado ? 'selected' : ''); ?>>Sí</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="resultado" class="block text-sm font-bold mb-2">Resultado (opcional):</label>
                <input type="text" name="resultado" value="<?php echo e($partido->resultado ?? ''); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/partidos/edit.blade.php ENDPATH**/ ?>