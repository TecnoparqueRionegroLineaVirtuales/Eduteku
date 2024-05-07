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
            @foreach ($multimedia as $multimedias)
                <h2 class="text-xs text-green-500 tracking-widest font-medium title-font mb-1">Tecnoparque Nodo Rionegro</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $multimedias->name }}</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-justify p-20">{{ $multimedias->descripcion }}</p>
                <div class="w-100px h-50px">
                    <img class="object-cover object-center rounded" alt="hero" src="{{ asset($multimedias->url) }}">
                </div>
            @endforeach
            </div>
            <div class="flex flex-wrap">
            @foreach ($lineas as $linea)
            <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">{{ $linea->name }}</h2>
                <p class="leading-relaxed text-base mb-4 text-justify">{{ $linea->descripcion }}</p>
                <a class="text-green-500 inline-flex items-center" href="https://redtecnoparque.com/lineas/">Conose mas...
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                </a>
            </div>
            @endforeach
            </div>
            <div class="flex flex-col text-center w-full mb-20">
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Si tienes una idea, registrala en red tecnoparque colombia.</p>
                <a href="https://tecnoparque.com.co/registro"><button class="flex mx-auto mt-16 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Registra tu idea</button></a>
            </div>
        </div>
    </section>
    </body>
</html>