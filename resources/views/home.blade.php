<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="/partidos/index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>

            </svg>
               <span class="ms-3">Calendario</span>
            </a>
         </li>
         <li>
            <a href="/equipos/index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z"/>
            </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">Equipos</span>
                </a>
         </li>
         @guest
         <li>
            <a href="{{ route('login') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">Iniciar sesion</span>
            </a>
         </li>
         <li>
            <a href="/equipos/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
            </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">Registra a tu equipo</span>
            </a>
         </li> 
         @endguest
         @auth
         <li>
         <a href="{{ route('dashboard.edit', ['id' => Auth::user()->id]) }}" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"  width="24">
                     <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd" />
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Editar Perfil</span>
            </a>
         </li>
         <li>
            @if(Auth::check() && Auth::user()->admin_status == 1)
               <a href="{{ route('dashboard.editall') }}" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"  width="24">
                  <path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                  </svg>


                     <span class="flex-1 ms-3 whitespace-nowrap">Editar otros perfiles</span>
               </a>
            @endif
         </li>
         <li>
            
            <form action="{{ route('logout') }}" method="POST" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               @csrf
               <button type="submit" class="flex items-center w-full text-left">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM2.046 15.253c-.058.468.172.92.57 1.175A9.953 9.953 0 0 0 8 18c1.982 0 3.83-.578 5.384-1.573.398-.254.628-.707.57-1.175a6.001 6.001 0 0 0-11.908 0ZM12.75 7.75a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Cerrar sesión</span>
               </button>
            </form>
         </li>
         @endauth
         
         <li>
            @if(Auth::check() && Auth::user()->admin_status == 1)
               <a href="{{ route('partidos.create') }}" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
               <path fill-rule="evenodd" d="M15.988 3.012A2.25 2.25 0 0 1 18 5.25v6.5A2.25 2.25 0 0 1 15.75 14H13.5V7A2.5 2.5 0 0 0 11 4.5H8.128a2.252 2.252 0 0 1 1.884-1.488A2.25 2.25 0 0 1 12.25 1h1.5a2.25 2.25 0 0 1 2.238 2.012ZM11.5 3.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 .75.75v.25h-3v-.25Z" clip-rule="evenodd" />
               <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm2 3.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Zm0 3.5a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
               </svg>

                     <span class="flex-1 ms-3 whitespace-nowrap">Crear Partido</span>
               </a>
            @endif
         </li>
         <li>
            @if(Auth::check() && Auth::user()->admin_status == 1)
               <a href="{{ route('partidos.all') }}" class="btn btn-info flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" width="24">
               <path d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
               </svg>


                     <span class="flex-1 ms-3 whitespace-nowrap">Modificar partidos</span>
               </a>
            @endif
         </li>
</li>
      </ul>
   </div>
</aside>

   <div class="p-4 sm:ml-64">
   
<div class="container mx-auto mt-8">
        <div class="grid grid-cols-3 gap-4 mb-4 bg-blue-100">
            @foreach($proximosPartidos as $partido)
                @if(!$partido->jugado)  <!--Table thinked for usually having more than 3 games unplayeds -->
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                            {{ $partido->equipoLocal->nombre_equipo ?? 'Desconocido' }} vs {{ $partido->equipoVisitante->nombre_equipo ?? 'Desconocido' }}
                            <br>
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $partido->fecha->format('d M Y, H:i') }}
                            </span>
                        </p>
                    </div>
                @endif
            @endforeach
        </div>
   </div>
      </div>

      <div class="container mx-auto mt-8">
    <div class="text-center mb-4">
        <p class="text-2xl text-gray-400 dark:text-gray-500">Tabla clasificación
            <svg class="w-3.5 h-3.5 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
    </div>
    <div class="flex justify-center">
        <table class="min-w-full bg-white text-center">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">Posición</th>
                    <th class="py-2 px-4 bg-gray-200">Nombre del Equipo</th>
                    <th class="py-2 px-4 bg-gray-200">Puntos</th>
                    <th class="py-2 px-4 bg-gray-200">Partidos Jugados</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($users) && $users->count() > 0)
                    @foreach ($users as $index => $equipo)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $equipo->nombre_equipo }}</td>
                        <td class="border px-4 py-2">{{ $equipo->puntos }}</td>
                        <td class="border px-4 py-2">{{ $equipo->partidos_jugados }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="border px-4 py-2" colspan="4">No hay datos disponibles</td>
                    </tr>
                @endif
            </tbody>
               </table>
            </div>
         </div>


      

      <div class="p-4 sm:ml-64">
   
            <div class="container mx-auto mt-8">
            <p class="text-2xl text-center text-gray-400 dark:text-gray-500 mb-4">Resultados de partidos jugados</p>
            <div class="grid grid-cols-3 gap-4">
                  <!-- Iteración sobre partidos jugados -->
                  @foreach($resultadosPartidos as $partido)
                     <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                              {{ $partido->equipoLocal->nombre_equipo ?? 'Desconocido' }} vs {{ $partido->equipoVisitante->nombre_equipo ?? 'Desconocido' }} - {{ $partido->resultado ?? 'Sin resultado' }}
                              <br>
                              <span class="text-sm text-gray-600 dark:text-gray-400">
                                 {{ $partido->fecha->format('d M Y, H:i') }}
                              </span>
                        </p>
                     </div>
                  @endforeach
            </div>
         </div>
         </div>
   
      
      </div>
      
   </div>
</div>

 
</body>
</html>