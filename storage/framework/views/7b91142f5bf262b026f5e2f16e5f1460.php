<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Usuarios</h1>

        <?php if(session('success')): ?>
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

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
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="p-2"><?php echo e($user->id); ?></td>
                        <td class="p-2"><?php echo e($user->username); ?></td>
                        <td class="p-2"><?php echo e($user->nombre_equipo); ?></td>
                        <td class="p-2"><?php echo e($user->email); ?></td>
                        <td class="p-2"><?php echo e($user->puntos); ?></td>
                        <td class="p-2"><?php echo e($user->partidos_jugados); ?></td>
                        <td class="p-2"><?php echo e($user->admin_status ? 'Sí' : 'No'); ?></td>
                        <td class="p-2">
                            <a href="<?php echo e(route('dashboard.editone', $user->id)); ?>" class="bg-blue-500 text-white px-3 py-1 rounded">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="flex justify-start mt-4">
            <a href="/" class="volver-button flex items-center text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/dashboard/editall.blade.php ENDPATH**/ ?>