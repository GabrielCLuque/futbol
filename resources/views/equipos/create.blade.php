<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" >
        
        <form action="/equipo" method="POST">
            @csrf
           <div class=" grid grid-cols-1 gap-4 place-items-center">
                  <div class="form-group ">
                     <label for="nombre_usuario" class="block mb-2 text-lg font-semibold text-center" >Nombre de Usuario</label>
                     <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control w-full p-2 border rounded" required>
                  </div>
                  <div class="form-group">
                     <label for="nombre" class="block mb-2 text-lg font-semibold text-center">Nombre del club</label>
                     <input type="text" name="nombre" id="nombre" class="form-control w-full p-2 border rounded" required>
                  </div>
                  <div class="form-group">
                     <label for="mail" class="block mb-2 text-lg font-semibold text-center">Email</label>
                     <input type="email" name="mail" id="mail" class="form-control w-full p-2 border rounded" required>
                  </div>
                  <div class="form-group">
                     <label for="contrasena" class="block mb-2 text-lg font-semibold text-center">Contraseña</label>
                     <input type="password" name="contrasena" id="contrasena" class="form-control w-full p-2 border rounded" required>
                  </div>
                  <div class="form-group">
                     <label for="fecha_fundacion" class="block mb-2 text-lg font-semibold text-center">Fecha de Fundación</label>
                     <input type="date" name="fecha_fundacion" id="fecha_fundacion" class="form-control w-full p-2 border rounded ">
                  </div>
                  <div class="form-group">
                     <label for="direccion" class="block mb-2 text-lg font-semibold text-center">Dirección</label>
                     <input type="text" name="direccion" id="direccion" class="form-control w-full p-2 border rounded">
                  </div>
                  <button type="submit" class="btn btn-primary">Crear Equipo</button>
            </div>
        </form>
    </div>
</body>
</html>