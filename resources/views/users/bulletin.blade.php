<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased">
    @include('components.nav-landing')
        <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
        @foreach($multimedia as $multimedias)
            <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">{{ $multimedias->name }}</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $multimedias->descripcion }}</p>
        @endforeach
            </div>
            
            <div class="flex flex-wrap -m-4">
                @foreach($boletin as $boletins)
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset($boletins->url) }}">
                        <div class="w-full">
                            <h2 class="title-font font-medium text-lg text-gray-900">{{ $boletins->name }}</h2>
                            <h3 class="text-blue-500 font-bold mb-3"><a href="{{ $boletins->link }}" target="_blank">Descarga el boletin</a></h3>
                            <p class="mb-4">{{ $boletins->descripcion }}</p>
                        </div>
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
        </section>
    </body>
</html>