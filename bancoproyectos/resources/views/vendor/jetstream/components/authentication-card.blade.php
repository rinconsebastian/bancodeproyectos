<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div>
    <h3 
    style="font-size: 40px; font-weight: 900; color: #444444; margin-top: 25px;" class=" text-center text-bold text-3xl">{{ config('app.name') }}</h3>
    </div>


    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
