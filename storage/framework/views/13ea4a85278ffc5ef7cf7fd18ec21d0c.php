<!DOCTYPE html>
<html>
<head>
    <title>Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
    <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Volver</a>
        <h1 class="text-2xl font-bold mb-4">Equipos</h1>
        <table id="equiposTable" class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Nombre</th>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Puntos</th>
                    <th class="py-2 px-4 bg-gray-200 cursor-pointer">Partidos Jugados</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($nombre_equipo); $i++): ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo e($nombre_equipo[$i]); ?></td>
                        <td class="border px-4 py-2"><?php echo e($puntos[$i]); ?></td>
                        <td class="border px-4 py-2"><?php echo e($partidos_jugados[$i]); ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('th').each(function (column) {
                $(this).click(function () {
                    var rows = $('#equiposTable tbody tr').get();
                    var sortOrder = 'asc';
 
                    if (column === 1 || column === 2) {
                        sortOrder = 'desc';
                    }

                    rows.sort(function (a, b) {
                        var A = $(a).children('td').eq(column).text().toUpperCase();
                        var B = $(b).children('td').eq(column).text().toUpperCase();

                        if ($.isNumeric(A) && $.isNumeric(B)) {
                            A = parseInt(A);
                            B = parseInt(B);
                        }

                        if (sortOrder === 'asc') {
                            if (A < B) {
                                return -1;
                            }
                            if (A > B) {
                                return 1;
                            }
                        } else {
                            if (A > B) {
                                return -1;
                            }
                            if (A < B) {
                                return 1;
                            }
                        }
                        return 0;
                    });

                    $.each(rows, function (index, row) {
                        $('#equiposTable').children('tbody').append(row);
                    });
                });
            });
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel\futbol\resources\views/equipos/index.blade.php ENDPATH**/ ?>