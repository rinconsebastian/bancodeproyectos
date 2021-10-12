<x-appb-layout>

    <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">

        <div wire:id="tBdYTDOfBiGAAnPErBia">
            <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">

                <div class="-mx-3 md:flex mb-6">
                    <div class=" px-3 mb-6 md:mb-0">
                        <h1 class="block uppercase tracking-wide text-2xl text-grey-darker font-bold mb-2">
                            Modificar proyecto
                        </h1>

                    </div>

                </div>
               <form action="{{route('proyectos.update',$proyecto)}}" method="POST">
                @csrf
                @method('put')
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="nombre">
                            Nombre del proyecto
                        </label>
                        <input
                            class="appearance-none block w-full  bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="name" name="name" type="text" value='{{$proyecto->name}}' placeholder="Nombre del proyecto">
                            @error('name')
                            <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                             @enderror
                            
                    </div>

                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="fuente">
                            Fuente de Financiación
                        </label>
                        <select
                            class="appearance-none block w-full  value='$proyecto->fuente}}'  bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            name="fuente" id="fuente">
                            <option hidden selected value="">Selecciona una fuente de financiación</option>
                            <option  {{$proyecto->fuente == "Cooperación" ? "selected" : ""}} value="Cooperación">Cooperación</option>
                            <option {{$proyecto->fuente == "Regalias" ? "selected" : ""}} value="Regalias">Regalias</option>
                            <option {{$proyecto->fuente == "Propios" ? "selected" : ""}} value="Propios">Propios</option>
                        </select>
                        @error('fuente')
                            <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                             @enderror

                        
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="valor">
                            Valor
                        </label>
                        <input
                            class="currency appearance-none block w-full bg-grey-lighter text-grey-darker text-right border border-grey-lighter rounded py-3 px-4"
                            type="number" placeholder="Valor del proyecto" min="1000" step="1" data-number-to-fixed="2"
                            data-number-stepfactor="100" id="valor" name="valor"  value='{{$proyecto->valor}}'  />
                            @error('valor')
                            <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                             @enderror
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-2">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="fase">
                            Fase
                        </label>
                        <select
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            name="fase" id="fase"  value='{{$proyecto->fase}}' >
                            <option hidden selected value="">Selecciona una Fase</option>
                            <option  {{$proyecto->fase == "1" ? "selected" : ""}} value="1">I</option>
                            <option  {{$proyecto->fase == "2" ? "selected" : ""}} value="2">II</option>
                            <option  {{$proyecto->fase == "3" ? "selected" : ""}} value="3">III</option>
                            <option  {{$proyecto->fase == "4" ? "selected" : ""}} value="4">IV</option>
                            <option  {{$proyecto->fase == "5" ? "selected" : ""}} value="5">V</option>
                        </select>
                        @error('fase')
                            <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                             @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="sector">
                            SECTOR
                        </label>
                        <div class="relative">
                            <select
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                name="sector" id="sector" placehoder="seleccione" value="{{$proyecto->sector}}"  >
                                <option hidden selected value="">Seleccione un sector</option>
                                
                                @foreach ($sectores as $sector)
                                
                                <option  {{$proyecto->sector == $sector ? "selected" : ""}} value="{{$sector}}">{{$sector}}</option>


                                @endforeach


                            </select>
                            @error('sector')
                            <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                             @enderror
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="tiempo"   >
                            Tiempo de ejecucion
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="tiempo" name="tiempo" type="number" placeholder="Tiempo en meses" value='{{$proyecto->tiempo}}'>
                            @error('tiempo')
                            <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                             @enderror
                    </div>
                    
                </div>
                <div class="-mx-3 md:flex mb-6">
                  <div class="md:w-full px-3 mb-6 md:mb-0">
                    
                    <button type="submit" class="inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                      Corregir proyecto
                  </button>
                  
                </div>
              </form>

            </div>

        </div>




        @section("scriptsslot")
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
            <script src="../js/webshim/polyfiller.js"></script>
            <script>
                webshims.setOptions('forms-ext', {
                    replaceUI: 'auto',
                    types: 'number',
                    number: {
                        "classes": "hide-inputbtns"
                    }
                });
                webshims.polyfill('forms forms-ext');
            </script>
        @endsection




</x-appb-layout>
