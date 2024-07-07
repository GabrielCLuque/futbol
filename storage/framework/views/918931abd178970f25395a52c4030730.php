<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Partido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
    <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <h1 class="text-xl font-bold mb-4">Crear un Nuevo Partido</h1>
        <form action="<?php echo e(route('partidos.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <label for="id_equipo_local">Equipo Local:</label>
                <input type="number" id="id_equipo_local" name="id_equipo_local" required>
            </div>
            <div>
                <label for="id_equipo_visitante">Equipo Visitante:</label>
                <input type="number" id="id_equipo_visitante" name="id_equipo_visitante" required>
            </div>
            <div>
                <label for="fecha">Fecha del Partido:</label>
                <input type="datetime-local" id="fecha" name="fecha" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar Partido
            </button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/partidos/create.blade.php ENDPATH**/ ?>