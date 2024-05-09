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
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $multimedias->name }}</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $multimedias->descripcion }}</p>
                @endforeach
                </div>
                <div class="flex flex-wrap -m-4">
                @foreach ($edt as $edts)
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div class="flex relative">
                        <iframe alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="https://www.youtube.com/embed/{{ $edts->link }}" title="EDTS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                            <h2 class="tracking-widest text-sm title-font font-medium text-green-500 mb-1">EDT</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $edts->name }}</h1>
                            <p class="leading-relaxed">{{ $edts->descripcion }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </body>
</html>
