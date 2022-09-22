<x-appb-layout>

    <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">

        <div wire:id="tBdYTDOfBiGAAnPErBia">
            <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">

                <div class="-mx-3 md:flex mb-6">
                    <div class=" px-3 mb-6 md:mb-0">
                        <h1 class="block uppercase tracking-wide text-2xl text-grey-darker font-bold mb-2">
                            Registrar nuevo proyecto
                        </h1>

                    </div>

                </div>
                <form action="{{ route('proyectos.store') }}" method="POST">
                    @csrf
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="nombre">
                                Nombre del proyecto
                            </label>
                            <input
                                class="appearance-none block w-full  bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                id="name" name="name" type="text" value="{{ old('name') }}"
                                placeholder="Nombre del proyecto">
                            @error('name')
                                <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 h-10">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="fuente">
                                Fuente de Financiación {{ old('fuente') }}
                            </label>
                            <select x-cloak style="display:none "
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                value="{{ old('fuente1') }}" name="fuente1" id="select">
                                <option {{ old('fuente1') == 'Propios' ? 'selected' : '' }} value="Propios">Propios
                                </option>
                                <option {{ old('fuente1') == 'Regalias' ? 'selected' : '' }} value="Regalias">Regalias
                                </option>
                                <option {{ old('fuente1') == 'SGP' ? 'selected' : '' }} value="SGP">SGP
                                </option>
                                <option {{ old('fuente1') == 'Otros' ? 'selected' : '' }} value="Otros">Otros</option>
                            </select>

                            <div x-data="dropdown()" x-init="loadOptions()" class="w-full  flex flex-col items-center h-64 mx-auto">
                                <input name="fuente" type="hidden" value="{{ old('fuente') }}" x-bind:value="selectedValues()">
                                <div class="inline-block relative w-full ">
                                  <div class="flex flex-col items-center relative">
                                    <div x-on:click="open" class="w-full">
                                      <div class="my-0 py-2 flex border border-gray-200 bg-white rounded">
                                        <div class="flex flex-auto flex-wrap">
                                          <template x-for="(option,index) in selected" :key="options[option].value">
                                            <div class="flex justify-center items-center m-1 font-medium py-1 px-1 bg-white rounded bg-gray-100 border">
                                              <div class="text-xs font-normal leading-none max-w-full flex-initial x-model=" options[option] x-text="options[option].text"></div>
                                              <div class="flex flex-auto flex-row-reverse">
                                                <div x-on:click.stop="remove(index,option)">
                                                  <svg class="fill-current h-4 w-4 " role="button" viewBox="0 0 20 20">
                                                    <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                         c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                         l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                         C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                  </svg>
                              
                                                </div>
                                              </div>
                                            </div>
                                          </template>
                                          <div x-show="selected.length == 0" class="flex-1">
                                            <input placeholder="Seleccione al menos una fuente" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800" x-bind:value="selectedValues()">
                                          </div>
                                        </div>
                                        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                              
                                          <button type="button" x-show="isOpen() === true" x-on:click="open" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                            <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                              <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                  c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                  L17.418,6.109z" />
                                            </svg>
                              
                                          </button>
                                          <button type="button" x-show="isOpen() === false" @click="close" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                              <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                                  c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                                  " />
                                            </svg>
                              
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="w-full px-4">
                                      <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select" x-on:click.away="close">
                                        <div class="flex flex-col w-full overflow-y-auto h-64">
                                          <template x-for="(option,index) in options" :key="option" class="overflow-auto">
                                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100" @click="select(index,$event)">
                                              <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                <div class="w-full items-center flex justify-between">
                                                  <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                                  <div x-show="option.selected">
                                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                                      <path fill="none" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                                                          C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                                                          L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"></path>
                                                    </svg>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </template>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            

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
                                    type="number" placeholder="Valor del proyecto" min="1000" step="1"
                                    data-number-to-fixed="2" data-number-stepfactor="100" id="valor" name="valor"
                                    value="{{ old('valor') }}" />
                                @error('valor')
                                    <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="-mx-3 md:flex mb-2">
                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="fase">
                                    Fase
                                </label>
                                <select
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                    name="fase" id="fase" value="{{ old('fase') }}">
                                    <option hidden selected value="">Selecciona una Fase</option>
                                    <option {{ old('fase') == 'II Prefactibilidad' ? 'selected' : '' }}
                                        value="II Prefactibilidad">II Prefactibilidad</option>
                                    <option {{ old('fase') == 'III Factibilidad' ? 'selected' : '' }}
                                        value="III Factibilidad">III Factibilidad</option>
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
                                        name="sector" id="sector" placehoder="seleccione">
                                        <option hidden selected value="">Seleccione un sector</option>
                                        @foreach ($sectores as $sector)
                                        <option {{ old('sector') == $sector ? 'selected' : '' }} value="{{$sector}}">
                                            {{$sector}}</option>
                                        @endforeach
                                        
                                        


                                    </select>
                                    @error('sector')
                                        <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="tiempo">
                                    Tiempo de ejecucion
                                </label>
                                <input
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                    id="tiempo" name="tiempo" type="number" placeholder="Tiempo en meses"
                                    value="{{ old('tiempo') }}">
                                @error('tiempo')
                                    <p class="alert alert-danger text-xs  italic text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="-mx-3 md:flex mb-6">
                            <div class="md:w-full px-3 mb-6 md:mb-0">

                                <button type="submit"
                                    class="inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Crear proyecto
                                </button>

                            </div>
                </form>

            </div>

        </div>




        @section('scriptsslot')
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

            <script>
               function dropdown() {
                return {
                    options: [],
                    selected: [],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    select(index, event) {

                        if (!this.options[index].selected) {

                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                    },
                    remove(index, option) {
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);


                    },
                    loadOptions() {
                        const options = document.getElementById('select').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }


                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }
            </script>
        @endsection




</x-appb-layout>
