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
        

    <header class="text-gray-600 body-font">
    @include('components.nav-landing')
    <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Realiza nuestros
            <br class="hidden lg:inline-block">Cursos GRATIS.
        </h1>
        <p class="mb-8 leading-relaxed">Aprende de desarrollo de producto en las lineas de Biotecnologia, diseño e ingenieria, Electronica, desarrollo de software, idea de negocio, y muchos mas cursos que te enseñaran el camino para materializar tu idea de negocio.</p>
        <div class="flex justify-center">
            <button class="inline-flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Registrate</button>
        </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
        </div>
    </div>
    </section>
    @include('components.footer')
    </body>
</html>
