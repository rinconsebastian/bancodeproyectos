<div>
    @php
        
        $num = $total;
        $open = "false";
    @endphp
    <div class="w-full  mx-auto shadow-md">

        @foreach ($historias as $historia)
            @php
                $open = "false";
                if ($num == $total) {
                    $open = "true";
                }
            @endphp
            
            @livewire('proyecto.historian',['idhistoria' => $historia->id, 'num'=>$num, 'open' => $open])



            @php
                $num--;
            @endphp
        @endforeach







    </div>



    {{-- Care about people's approval and you will be their prisoner. --}}
</div>
