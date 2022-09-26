<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-7 p-2 gap-4">
        @can('proyectos.create')


            <div onClick="window.location = ('{{ route('proyectos.create') }}')"
                class="cursor-pointer hover:bg-green-600 bg-green-500 dark:bg-gray-800  dark:hover:bg-gray-900 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-white font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-green-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />

                    </svg>
                   
                      
                </div>
                <div class="text-center">
                    <p class="text-2xl">Crear proyecto</p>

                </div>
            </div>
        @endcan
        <div  onClick="window.location = ('{{ route('proyectos.listado', 'Borrador') }}')"
            class="cursor-pointer bg-blue-500 hover:bg-blue-800 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />

                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl"> @livewire('proyecto.cuentaresumen',['estado' => 'Borrador' ,'usuario' => Auth::user()->id ])</p>
                <p>Borradores</p>
            </div>
        </div>
        <div onClick="window.location = ('{{ route('proyectos.listado', 'Presentado') }}')"
            class="cursor-pointer bg-blue-500 hover:bg-blue-800 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                  
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl"> @livewire('proyecto.cuentaresumen',['estado' => 'Presentado' ,'usuario' => Auth::user()->id ])</p>
                <p>Presentados</p>
            </div>
        </div>
        <div onClick="window.location = ('{{ route('proyectos.listado', 'Revisión') }}')"
        class="cursor-pointer bg-blue-500 hover:bg-blue-800 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
        <div
            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
        </div>
        <div class="text-right">
            <p class="text-2xl"> @livewire('proyecto.cuentaresumen',['estado' => 'Revisión' ,'usuario' => Auth::user()->id ])</p>
            <p>Revisión</p>
        </div>
    </div>
        <div onClick="window.location = ('{{ route('proyectos.listado', 'Aprobado') }}')"
            class=" cursor-pointer bg-blue-500 hover:bg-blue-800 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                  </svg>    
            </div>
            <div class="text-right">
                <p class="text-2xl"> @livewire('proyecto.cuentaresumen',['estado' => 'Aprobado' ,'usuario' => Auth::user()->id ])</p>
                <p>Aprobados</p>
            </div>
        </div>
        <div onClick="window.location = ('{{ route('proyectos.listado', 'Registrado') }}')"
        class=" cursor-pointer bg-blue-500 hover:bg-blue-800 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
        <div
            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg class="h-6 w-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <style type="text/css"> .st0{fill:#2240AF;} </style> <title>document-and-pen-1-outline</title> 
                <path class="st1" d="M482.6,250.4l18.1-18.1c15-15,15-39.3,0-54.3s-39.3-15-54.3,0l-36.9,36.9v-61.3L256.1,0H64C28.7,0,0,28.7,0,64 v384c0,35.3,28.7,64,64,64h281.6c35.3,0,64-28.7,64-64V323.5l55-55l9,9l-18.1,18.1c-5.1,4.9-5.2,13-0.3,18.1 c4.9,5.1,13,5.2,18.1,0.3c0.1-0.1,0.2-0.2,0.3-0.3l27.2-27.2c5-5,5-13.1,0-18.1L482.6,250.4z M268.8,49.1l91.5,91.7h-53.1 c-21.2,0-38.4-17.2-38.4-38.4V49.1z M384,448c0,21.2-17.2,38.4-38.4,38.4H64c-21.2,0-38.4-17.2-38.4-38.4V64 c0-21.2,17.2-38.4,38.4-38.4h179.2v76.8c0,35.3,28.7,64,64,64l0,0H384v74.1L265.4,359c-11.5,11.5-14.5,29-7.4,43.6l-1.1,1.1 c-13.8-14.8-27.3-21.3-40.9-19.6c-13,1.6-20.8,10-27.1,16.8c-4.7,5.1-7.8,8.3-11.3,8.8c-1.5-0.1-5.5-4.6-7.9-7.4 c-5.9-7-14-16.5-27.5-18.2c-16.7-2-33,8-50.1,30.6c-4.4,5.6-3.4,13.6,2.2,18s13.6,3.4,18-2.2c0.1-0.1,0.2-0.2,0.3-0.3 c10.5-13.9,20.2-21.5,26.7-20.6c3.2,0.4,6.5,3.9,11,9.3c6,7,14,16.5,27,16.5c1.1,0,2.3-0.1,3.4-0.2c13-1.6,20.8-10,27.1-16.8 c4.8-5.2,7.8-8.3,11.3-8.8c6.4-0.9,16.1,6.8,26.7,20.6c2.4,3.1,6.1,5,10.1,5c0.2,0,0.5,0,0.7,0h0.5c3.2-0.1,6.2-1.5,8.4-3.7 l10.7-10.7c14.6,7.2,32.2,4.2,43.6-7.4l64.4-64.3V448H384z M301.6,395.2c-5,5-13.1,5-18.1,0l0,0c-5-5-5-13.1,0-18.1l144.8-144.8 l18.1,18.1L301.6,395.2z M464.5,232.3l-3.3-3.3l-14.8-14.8l18.1-18.1c1-0.9,2.1-1.7,3.3-2.3c1.1-0.6,2.3-1,3.5-1.2 c0.7-0.1,1.5-0.2,2.2-0.2c0.8,0,1.5,0.1,2.3,0.3c1.5,0.3,2.9,0.8,4.2,1.5c6.1,3.6,8.1,11.5,4.4,17.6c-0.5,0.9-1.2,1.7-1.9,2.5 L464.5,232.3z M89.6,192c0-7.1,5.7-12.8,12.8-12.8l0,0h77.2c7.1,0,12.8,5.7,12.8,12.8s-5.7,12.8-12.8,12.8h-77.2 C95.3,204.8,89.6,199.1,89.6,192L89.6,192z M89.6,243.2c0-7.1,5.7-12.8,12.8-12.8l0,0h154c7.1,0,12.8,5.7,12.8,12.8 s-5.7,12.8-12.8,12.8h-154C95.3,256,89.6,250.3,89.6,243.2z"/> </svg>
            </span>
        </div>
        <div class="text-right">
            <p class="text-2xl">  @livewire('proyecto.cuentaresumen',['estado' => 'Registrado' ,'usuario' => Auth::user()->id ])</p>
            <p>Registrados</p>
        </div>
    </div>
        <div  onClick="window.location = ('{{ route('proyectos.listado', 'Devuelto') }}')"
            class="  cursor-pointer bg-blue-500 hover:bg-blue-800 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                   
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">  @livewire('proyecto.cuentaresumen',['estado' => 'Devuelto' ,'usuario' => Auth::user()->id ])</p>
                <p>Devueltos</p>
            </div>
        </div>
    </div>
</div>
