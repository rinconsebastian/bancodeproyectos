<x-appb-layout>
   
    
 
    
    <div class="h-full  p-3 gap-4 flex flex-col flex-col-1">
    <!-- Borradores -->
    <x-marcotabla>
        <x-slot name='titulo'>Lista de usuarios </x-slot>
     
    @livewire('admin.users-index')
        
    </x-marcotabla>
    <!-- ./Borradores -->


       
  
        
      </div>





  
</x-appb-layout>
