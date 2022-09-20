<div>
    <!-- Sidebar -->
    <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-bold tracking-wide text-white uppercase">Proyectos</div>
              </div>
            </li>
            <li>
              <a href="{{route('proyectos.index')}}" class="{{(request()->url() == route('proyectos.index'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>  
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Inicio</span>
              </a>
            </li>
            <li>
              
              
              
              <a href="{{route('proyectos.listado', 'Borrador')}}" class="{{(request()->url() == route('proyectos.listado', 'Borrador'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>  
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Borradores</span>
                @livewire('proyecto.cuenta',['estado' => 'Borrador' ,'usuario' => Auth::user()->id ])
              </a>
            </li>
            <li>
              <a href="{{route('proyectos.listado', 'Presentado')}}" class="{{(request()->url() == route('proyectos.listado', 'Presentado'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-400 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                  </svg>    
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Presentados</span>
                @livewire('proyecto.cuenta',['estado' => 'Presentado' ,'usuario' => Auth::user()->id ])
              </a>
            </li>
            <li>
              <a href="{{route('proyectos.listado', 'Aprobado')}}" class="{{(request()->url() == route('proyectos.listado', 'Aprobado'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                  </svg>    
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Aprobados</span>
                @livewire('proyecto.cuenta',['estado' => 'Aprobado' ,'usuario' => Auth::user()->id ])
              </a>
              <li>
                <a href="{{route('proyectos.listado', 'Registrado')}}" class="{{(request()->url() == route('proyectos.listado', 'Registrado'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="h-6 w-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <style type="text/css"> .st0{fill:#FFFFFF;} </style> <title>document-and-pen-1-outline</title> <path class="st0" d="M482.6,250.4l18.1-18.1c15-15,15-39.3,0-54.3s-39.3-15-54.3,0l-36.9,36.9v-61.3L256.1,0H64C28.7,0,0,28.7,0,64 v384c0,35.3,28.7,64,64,64h281.6c35.3,0,64-28.7,64-64V323.5l55-55l9,9l-18.1,18.1c-5.1,4.9-5.2,13-0.3,18.1 c4.9,5.1,13,5.2,18.1,0.3c0.1-0.1,0.2-0.2,0.3-0.3l27.2-27.2c5-5,5-13.1,0-18.1L482.6,250.4z M268.8,49.1l91.5,91.7h-53.1 c-21.2,0-38.4-17.2-38.4-38.4V49.1z M384,448c0,21.2-17.2,38.4-38.4,38.4H64c-21.2,0-38.4-17.2-38.4-38.4V64 c0-21.2,17.2-38.4,38.4-38.4h179.2v76.8c0,35.3,28.7,64,64,64l0,0H384v74.1L265.4,359c-11.5,11.5-14.5,29-7.4,43.6l-1.1,1.1 c-13.8-14.8-27.3-21.3-40.9-19.6c-13,1.6-20.8,10-27.1,16.8c-4.7,5.1-7.8,8.3-11.3,8.8c-1.5-0.1-5.5-4.6-7.9-7.4 c-5.9-7-14-16.5-27.5-18.2c-16.7-2-33,8-50.1,30.6c-4.4,5.6-3.4,13.6,2.2,18s13.6,3.4,18-2.2c0.1-0.1,0.2-0.2,0.3-0.3 c10.5-13.9,20.2-21.5,26.7-20.6c3.2,0.4,6.5,3.9,11,9.3c6,7,14,16.5,27,16.5c1.1,0,2.3-0.1,3.4-0.2c13-1.6,20.8-10,27.1-16.8 c4.8-5.2,7.8-8.3,11.3-8.8c6.4-0.9,16.1,6.8,26.7,20.6c2.4,3.1,6.1,5,10.1,5c0.2,0,0.5,0,0.7,0h0.5c3.2-0.1,6.2-1.5,8.4-3.7 l10.7-10.7c14.6,7.2,32.2,4.2,43.6-7.4l64.4-64.3V448H384z M301.6,395.2c-5,5-13.1,5-18.1,0l0,0c-5-5-5-13.1,0-18.1l144.8-144.8 l18.1,18.1L301.6,395.2z M464.5,232.3l-3.3-3.3l-14.8-14.8l18.1-18.1c1-0.9,2.1-1.7,3.3-2.3c1.1-0.6,2.3-1,3.5-1.2 c0.7-0.1,1.5-0.2,2.2-0.2c0.8,0,1.5,0.1,2.3,0.3c1.5,0.3,2.9,0.8,4.2,1.5c6.1,3.6,8.1,11.5,4.4,17.6c-0.5,0.9-1.2,1.7-1.9,2.5 L464.5,232.3z M89.6,192c0-7.1,5.7-12.8,12.8-12.8l0,0h77.2c7.1,0,12.8,5.7,12.8,12.8s-5.7,12.8-12.8,12.8h-77.2 C95.3,204.8,89.6,199.1,89.6,192L89.6,192z M89.6,243.2c0-7.1,5.7-12.8,12.8-12.8l0,0h154c7.1,0,12.8,5.7,12.8,12.8 s-5.7,12.8-12.8,12.8h-154C95.3,256,89.6,250.3,89.6,243.2z"/> </svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Registrados</span>
                  @livewire('proyecto.cuenta',['estado' => 'Registrado' ,'usuario' => Auth::user()->id ])
                </a>
            </li>
            <li class="px-5 mt-3 hidden md:block border-t-2 border-solid">
             
            </li>
            <li>
              <a href="{{route('proyectos.listado', 'Revisión')}}" class="{{(request()->url() == route('proyectos.listado', 'Revisión'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                  </svg>    
                </span>

                <span class="ml-2 text-sm tracking-wide truncate">Revisión</span>
                @livewire('proyecto.cuenta',['estado' => 'Revisión' ,'usuario' => Auth::user()->id ])
              </a>
            </li>
            <li>
                <a href="{{route('proyectos.listado', 'Devuelto')}}" class="{{(request()->url() == route('proyectos.listado', 'Ajustes'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                    </svg>    
                  </span>

                  <span class="ml-2 text-sm tracking-wide truncate">Devueltos</span>
                  @livewire('proyecto.cuenta',['estado' => 'Devuelto' ,'usuario' => Auth::user()->id ])
                </a>
              </li>
              <li>
                <a href="{{route('proyectos.listado', 'Rechazado')}}" class="{{(request()->url() == route('proyectos.listado', 'Rechazado'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>  
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Rechazados</span>
                  @livewire('proyecto.cuenta',['estado' => 'Rechazado' ,'usuario' => Auth::user()->id ])
                </a>
              </li>
              <li>
                <a href="{{route('proyectos.listado', 'Eliminado')}}" class="{{(request()->url() == route('proyectos.listado', 'Eliminado'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>  
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Eliminados</span>
                  @livewire('proyecto.cuenta',['estado' => 'Eliminado' ,'usuario' => Auth::user()->id ])
                </a>
              </li>
              <li class="px-5 mt-3 hidden md:block border-t-2 border-solid">
             
              </li>
              <li>
                <a href="{{route('proyectos.reporte')}}" class="{{(request()->url() == route('proyectos.reporte'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="h-6 w-6 text-white" vversion="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 475.1 475.1" style="enable-background:new 0 0 475.1 475.1;" xml:space="preserve"> <style type="text/css"> .st0{fill:#FFFFFF;} </style> <g> <path class="st0" d="M461.7,50c-8.9-8.9-19.7-13.4-32.3-13.4H45.7C33.1,36.5,22.4,41,13.4,50C4.5,58.9,0,69.7,0,82.2v310.6 c0,12.6,4.5,23.3,13.4,32.3c8.9,8.9,19.7,13.4,32.3,13.4h383.7c12.6,0,23.3-4.5,32.3-13.4c8.9-9,13.4-19.7,13.4-32.3V82.2 C475.1,69.7,470.6,58.9,461.7,50z M146.2,392.9c0,2.7-0.9,4.9-2.6,6.6c-1.7,1.7-3.9,2.6-6.6,2.6H45.7c-2.7,0-4.9-0.9-6.6-2.6 c-1.7-1.7-2.6-3.9-2.6-6.6V338c0-2.7,0.9-4.9,2.6-6.6c1.7-1.7,3.9-2.6,6.6-2.6H137c2.7,0,4.9,0.9,6.6,2.6c1.7,1.7,2.6,3.9,2.6,6.6 L146.2,392.9L146.2,392.9z M146.2,283.2c0,2.7-0.9,4.9-2.6,6.6c-1.7,1.7-3.9,2.6-6.6,2.6H45.7c-2.7,0-4.9-0.9-6.6-2.6 c-1.7-1.7-2.6-3.9-2.6-6.6v-54.8c0-2.7,0.9-4.9,2.6-6.6c1.7-1.7,3.9-2.6,6.6-2.6H137c2.7,0,4.9,0.9,6.6,2.6 c1.7,1.7,2.6,3.9,2.6,6.6L146.2,283.2L146.2,283.2z M146.2,173.6c0,2.7-0.9,4.9-2.6,6.6c-1.7,1.7-3.9,2.6-6.6,2.6H45.7 c-2.7,0-4.9-0.9-6.6-2.6c-1.7-1.7-2.6-3.9-2.6-6.6v-54.8c0-2.7,0.9-4.9,2.6-6.6c1.7-1.7,3.9-2.6,6.6-2.6H137c2.7,0,4.9,0.9,6.6,2.6 c1.7,1.7,2.6,3.9,2.6,6.6L146.2,173.6L146.2,173.6z M292.4,392.9c0,2.7-0.9,4.9-2.6,6.6c-1.7,1.7-3.9,2.6-6.6,2.6h-91.4 c-2.7,0-4.9-0.9-6.6-2.6c-1.7-1.7-2.6-3.9-2.6-6.6V338c0-2.7,0.9-4.9,2.6-6.6c1.7-1.7,3.9-2.6,6.6-2.6h91.4c2.7,0,4.9,0.9,6.6,2.6 c1.7,1.7,2.6,3.9,2.6,6.6L292.4,392.9L292.4,392.9L292.4,392.9z M292.4,283.2c0,2.7-0.9,4.9-2.6,6.6c-1.7,1.7-3.9,2.6-6.6,2.6 h-91.4c-2.7,0-4.9-0.9-6.6-2.6c-1.7-1.7-2.6-3.9-2.6-6.6v-54.8c0-2.7,0.9-4.9,2.6-6.6c1.7-1.7,3.9-2.6,6.6-2.6h91.4 c2.7,0,4.9,0.9,6.6,2.6c1.7,1.7,2.6,3.9,2.6,6.6L292.4,283.2L292.4,283.2z M292.4,173.6c0,2.7-0.9,4.9-2.6,6.6 c-1.7,1.7-3.9,2.6-6.6,2.6h-91.4c-2.7,0-4.9-0.9-6.6-2.6c-1.7-1.7-2.6-3.9-2.6-6.6v-54.8c0-2.7,0.9-4.9,2.6-6.6 c1.7-1.7,3.9-2.6,6.6-2.6h91.4c2.7,0,4.9,0.9,6.6,2.6c1.7,1.7,2.6,3.9,2.6,6.6L292.4,173.6L292.4,173.6z M438.5,392.9 c0,2.7-0.9,4.9-2.6,6.6c-1.7,1.7-3.9,2.6-6.6,2.6H338c-2.7,0-4.9-0.9-6.6-2.6c-1.7-1.7-2.6-3.9-2.6-6.6V338c0-2.7,0.8-4.9,2.6-6.6 c1.7-1.7,3.9-2.6,6.6-2.6h91.4c2.7,0,4.9,0.9,6.6,2.6c1.7,1.7,2.6,3.9,2.6,6.6V392.9z M438.5,283.2c0,2.7-0.9,4.9-2.6,6.6 c-1.7,1.7-3.9,2.6-6.6,2.6H338c-2.7,0-4.9-0.9-6.6-2.6c-1.7-1.7-2.6-3.9-2.6-6.6v-54.8c0-2.7,0.8-4.9,2.6-6.6 c1.7-1.7,3.9-2.6,6.6-2.6h91.4c2.7,0,4.9,0.9,6.6,2.6c1.7,1.7,2.6,3.9,2.6,6.6V283.2z M438.5,173.6c0,2.7-0.9,4.9-2.6,6.6 c-1.7,1.7-3.9,2.6-6.6,2.6H338c-2.7,0-4.9-0.9-6.6-2.6c-1.7-1.7-2.6-3.9-2.6-6.6v-54.8c0-2.7,0.8-4.9,2.6-6.6 c1.7-1.7,3.9-2.6,6.6-2.6h91.4c2.7,0,4.9,0.9,6.6,2.6c1.7,1.7,2.6,3.9,2.6,6.6V173.6z"/> </g> </svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Reporte</span>
                  @livewire('proyecto.cuenta',['estado' => '' ,'usuario' => Auth::user()->id ])
                </a>
              </li>
              @if ($verroles == true | $verusuarios == true)
              <li class="px-5 mt-3 hidden md:block border-t-2 border-solid">
              <div class="flex flex-row items-center  h-8">
                <div class="  text-sm  font-bold tracking-wide text-white uppercase">Configuración</div>
              </div>
            </li>
            @endif
           @if ($verusuarios == true)
           <li>
            <a href="{{route('admin.users.index')}}" class="{{(request()->url() == route('admin.users.index'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
              <span class="inline-flex justify-center items-center ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </span>
              <span class="ml-2 text-sm tracking-wide truncate">Usuarios</span>
             
            </a>
          </li>
          @endif
          @if ($verroles == true)
           <li>
            <a href="{{route('admin.roles.index')}}" class="{{(request()->url() == route('admin.roles.index'))  ?'activemenu':''}} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 amenu">
              <span class="inline-flex justify-center items-center ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </span>
              <span class="ml-2 text-sm tracking-wide truncate">Roles</span>
             
            </a>
          </li>
               
           @endif
            
           
          </ul>
          <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
        </div>
      </div>
      <!-- ./Sidebar -->
</div>
