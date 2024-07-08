<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los Partidos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
        <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <div class="grid grid-cols-3 gap-4 mb-4 bg-blue-100">
            <?php $__currentLoopData = $partidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <div class="text-center">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                            <?php echo e($partido->equipoLocal->nombre_equipo ?? 'Desconocido'); ?> vs <?php echo e($partido->equipoVisitante->nombre_equipo ?? 'Desconocido'); ?>

                            <?php echo e($partido->jugado ? ' - Resultado: ' . $partido->resultado : ' - No Jugado'); ?>

                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <?php echo e($partido->fecha->format('d M Y, H:i')); ?>

                        </p>
                        <a href="<?php echo e(route('partidos.edit', $partido->id)); ?>" class="mt-2 inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Editar</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/partidos/all.blade.php ENDPATH**/ ?>