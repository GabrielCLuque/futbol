<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
        <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <h1 class="text-2xl font-bold mb-4">Equipos</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Nombre del Equipo</th>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Puntos</th>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Partidos Jugados</th>
                    <?php if(Auth::user()->admin_status == 1): ?>
                        <th class="py-2 px-4 bg-gray-200">Acciones</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($user->nombre_equipo); ?></td>
                    <td class="border px-4 py-2"><?php echo e($user->puntos); ?></td>
                    <td class="border px-4 py-2"><?php echo e($user->partidos_jugados); ?></td>
                    <?php if(Auth::user()->admin_status == 1): ?>
                        <td class="border px-4 py-2">
                            <form action="<?php echo e(route('equipos.destroy-target', $user->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/equipos/index.blade.php ENDPATH**/ ?>