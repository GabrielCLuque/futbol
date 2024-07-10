<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próximos Partidos</title>
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
        <div class="grid grid-cols-3 gap-4 mb-4 bg-blue-100">
            <?php $__currentLoopData = $partidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800 p-4">
                    <div class="text-center">
                        <p class="text-xl text-gray-400 dark:text-gray-500">
                            <?php echo e($partido->equipoLocal->nombre_equipo ?? 'Desconocido'); ?> vs <?php echo e($partido->equipoVisitante->nombre_equipo ?? 'Desconocido'); ?>

                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <?php echo e($partido->fecha->format('d M Y, H:i')); ?>

                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Resultado: <?php echo e($partido->resultado ?? 'sin resultado'); ?>

                        </p>
                    </div>
                    <div class="flex space-x-2 mt-2">
                        <a href="<?php echo e(route('partidos.edit', $partido->id)); ?>" class="px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">Editar</a>
                        <form action="<?php echo e(route('partidos.destroy', $partido->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">Eliminar</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="flex justify-start mt-4">
            <a href="/" class="volver-button flex items-center text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/partidos/all.blade.php ENDPATH**/ ?>