<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
       
        
        td, th {
            text-align: center;
        }
        .volver-button {
            padding: 1rem 2rem; /* Duplicar el tamaño del botón */
            font-size: 1.25rem; /* Ajustar el tamaño de la fuente */
            transition: background-color 0.3s;
        }
        .volver-button:hover {
            background-color: red;
        }
    </style>
</head>
<body class="bg-cover bg-center bg-no-repeat min-h-screen">
<div class="container mx-auto content-container">
    <div class="text-center mb-4">
        <div class="inline-block px-8 py-4">
            <p class="text-2xl text-gray-500">Classificación</p>
        </div>
    </div>
    <div >
        <table class="min-w-full bg-white bg-opacity-80 rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Posición</th>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Equipo</th>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Puntos</th>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Partidos Jugados</th>
                    <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->admin_status == 1): ?>
                        <th class="py-2 px-4 bg-gray-200">Acciones</th>
                    <?php endif; ?>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($index + 1); ?></td>
                    <td class="border px-4 py-2"><?php echo e($user->nombre_equipo); ?></td>
                    <td class="border px-4 py-2"><?php echo e($user->puntos); ?></td>
                    <td class="border px-4 py-2"><?php echo e($user->partidos_jugados); ?></td>
                    <?php if(auth()->guard()->check()): ?>
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
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="flex justify-start mt-4">
        <a href="/" class="volver-button flex items-center text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/equipos/index.blade.php ENDPATH**/ ?>