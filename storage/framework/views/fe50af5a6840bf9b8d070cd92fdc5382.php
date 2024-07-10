<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabriel League</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .page-bg {

            background-image: url('images/background.jpg'); /*otra foto por si hay demasiados partidos con resultado, aunque si se administra bien la paginano deberia llegar a verse */
            background-size: cover;
            background-position: center;
        }

        .sidebar-bg {
            background-image: url('images/sidebar.jfif');
            background-size: cover;
            background-position: center;
        }

        .hover-effect {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .hover-effect:hover {
            transform: scale(1.1);
            background-color: rgba(34, 139, 34, 0.5);
        }

        .rounded-title {
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .content-bg {
            background-image: url('images/table-bg.jfif');
            background-size: cover;
            background-position: center;
            padding: 2rem;
        }
    </style>
</head>
<body class="page-bg">

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 sidebar-bg" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 bg-opacity-70 dark:bg-gray-800 dark:bg-opacity-70">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/partidos/index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                    </svg>
                    <span class="ms-3">Calendario</span>
                </a>
            </li>
            <li>
                <a href="/equipos/index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Equipos</span>
                </a>
            </li>
            <?php if(auth()->guard()->guest()): ?>
            <li>
                <a href="<?php echo e(route('login')); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Iniciar sesión</span>
                </a>
            </li>
            <li>
                <a href="/equipos/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Registra a tu equipo</span>
                </a>
            </li> 
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <li>
                <a href="<?php echo e(route('dashboard.edit', ['id' => Auth::user()->id])); ?>" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Editar Perfil</span>
                </a>
            </li>
            <li>
                <?php if(Auth::check() && Auth::user()->admin_status == 1): ?>
                    <a href="<?php echo e(route('dashboard.editall')); ?>" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
                            <path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Editar otros perfiles</span>
                    </a>
                <?php endif; ?>
            </li>
            <li>
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="flex items-center w-full text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM2.046 15.253c-.058.468.172.92.57 1.175A9.953 9.953 0 0 0 8 18c1.982 0 3.83-.578 5.384-1.573.398-.254.628-.707.57-1.175a6.001 6.001 0 0 0-11.908 0ZM12.75 7.75a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Cerrar sesión</span>
                    </button>
                </form>
            </li>
            <?php endif; ?>
            <li>
                <?php if(Auth::check() && Auth::user()->admin_status == 1): ?>
                    <a href="<?php echo e(route('partidos.create')); ?>" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
                            <path fill-rule="evenodd" d="M15.988 3.012A2.25 2.25 0 0 1 18 5.25v6.5A2.25 2.25 0 0 1 15.75 14H13.5V7A2.5 2.5 0 0 0 11 4.5H8.128a2.252 2.252 0 0 1 1.884-1.488A2.25 2.25 0 0 1 12.25 1h1.5a2.25 2.25 0 0 1 2.238 2.012ZM11.5 3.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 .75.75v.25h-3v-.25Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm2 3.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Zm0 3.5a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Crear Partido</span>
                    </a>
                <?php endif; ?>
            </li>
            <li>
                <?php if(Auth::check() && Auth::user()->admin_status == 1): ?>
                    <a href="<?php echo e(route('partidos.all')); ?>" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover-effect">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
                            <path d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Modificar partidos</span>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</aside>

<div class="content-bg sm:ml-64 flex flex-col items-center justify-center min-h-screen">
    <div class="container mx-auto mt-8 text-center">
        <div class="text-center mb-4 rounded-title hover:scale-105 transform transition-transform duration-300">
            <a href="/partidos/index" class="block p-2 text-gray-900 dark:text-white">
                <p class="text-2xl text-gray-400 dark:text-gray-500">Partidos</p>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <?php $__currentLoopData = $proximosPartidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$partido->jugado): ?>
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                            <?php echo e($partido->equipoLocal->nombre_equipo ?? 'Desconocido'); ?> vs <?php echo e($partido->equipoVisitante->nombre_equipo ?? 'Desconocido'); ?>

                            <br>
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                <?php echo e($partido->fecha->format('d M Y, H:i')); ?>

                            </span>
                        </p>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="container mx-auto mt-8 text-center">
        <div class="text-center mb-4 rounded-title hover:scale-105 transform transition-transform duration-300">
            <a href="/equipos/index" class="block p-2 text-gray-900 dark:text-white">
                <p class="text-2xl text-gray-400 dark:text-gray-500">Podio</p>
            </a>
        </div>
        <div class="max-w-full lg:max-w-3xl mx-auto overflow-x-auto">
            <table class="w-full bg-white text-center">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200">Posición</th>
                        <th class="py-2 px-4 bg-gray-200">Equipo</th>
                        <th class="py-2 px-4 bg-gray-200">Puntos</th>
                        <th class="py-2 px-4 bg-gray-200">Partidos Jugados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($users) && $users->count() > 0): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $equipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border px-4 py-2 flex items-center justify-center">
                                    <?php if($index == 0): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="gold" class="ml-2 w-8 h-8">
                                    <?php elseif($index == 1): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="silver" class="ml-2 w-8 h-8">
                                    <?php else: ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="orange" class="ml-2 w-8 h-8">
                                    <?php endif; ?>
                                        <path fill-rule="evenodd" d="M10 1c-1.828 0-3.623.149-5.371.435a.75.75 0 0 0-.629.74v.387c-.827.157-1.642.345-2.445.564a.75.75 0 0 0-.552.698 5 5 0 0 0 4.503 5.152 6 6 0 0 0 2.946 1.822A6.451 6.451 0 0 1 7.768 13H7.5A1.5 1.5 0 0 0 6 14.5V17h-.75C4.56 17 4 17.56 4 18.25c0 .414.336.75.75.75h10.5a.75.75 0 0 0 .75-.75c0-.69-.56-1.25-1.25-1.25H14v-2.5a1.5 1.5 0 0 0-1.5-1.5h-.268a6.453 6.453 0 0 1-.684-2.202 6 6 0 0 0 2.946-1.822 5 5 0 0 0 4.503-5.152.75.75 0 0 0-.552-.698A31.804 31.804 0 0 0 16 2.562v-.387a.75.75 0 0 0-.629-.74A33.227 33.227 0 0 0 10 1ZM2.525 4.422C3.012 4.3 3.504 4.19 4 4.09V5c0 .74.134 1.448.38 2.103a3.503 3.503 0 0 1-1.855-2.68Zm14.95 0a3.503 3.503 0 0 1-1.854 2.68C15.866 6.449 16 5.74 16 5v-.91c.496.099.988.21 1.475.332Z" clip-rule="evenodd" />
                                    </svg>
                                </td>
                                <td class="border px-4 py-2"><?php echo e($equipo->nombre_equipo); ?></td>
                                <td class="border px-4 py-2"><?php echo e($equipo->puntos); ?></td>
                                <td class="border px-4 py-2"><?php echo e($equipo->partidos_jugados); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td class="border px-4 py-2" colspan="4">No hay datos disponibles</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container mx-auto mt-8 text-center">
        <div class="text-center mb-4 rounded-title">
            <p class="text-2xl text-gray-400 dark:text-gray-500">Resultados</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php $__currentLoopData = $resultadosPartidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col items-center justify-center h-36 rounded bg-gray-50 dark:bg-gray-800 p-4">
                    <div class="text-xl font-bold text-gray-800 dark:text-gray-200">
                        <?php echo e($partido->equipoLocal->nombre_equipo ?? 'Desconocido'); ?> vs <?php echo e($partido->equipoVisitante->nombre_equipo ?? 'Desconocido'); ?>

                    </div>
                    <div class="text-2xl my-2 text-gray-400 dark:text-gray-500">
                        <?php echo e($partido->resultado ?? 'Sin resultado'); ?>

                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        <?php echo e($partido->fecha->format('d M Y, H:i')); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/home.blade.php ENDPATH**/ ?>