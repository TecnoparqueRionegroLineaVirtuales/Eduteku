<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <title>Retos</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Asegúrate de que el menú tiene un z-index alto para que esté sobre otros contenidos */
        .navbar {
            z-index: 1000;
        }
    </style>
</head>
<body>
    @include('components.nav-landing')

    <!-- Sección Superior: Imagen, Título, Descripción -->
    <section class="text-gray-600 p-10 body-font mt-24"> <!-- Añadido mt-24 para margen superior -->
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 w-full mb-8 md:mb-0">
                <img class="object-cover object-center rounded-lg shadow-lg" alt="hero" src="{{ asset('storage/img/'.$challenge->img_url) }}">
            </div>
            <div class="md:w-1/2 w-full md:pl-16 flex flex-col items-start text-center md:text-left">
                <h1 class="title-font text-3xl md:text-4xl mb-4 font-medium text-gray-900">{{ $challenge->name }}</h1>
                <p class="mb-8 leading-relaxed text-gray-700 text-justify">{!! $challenge->description !!}</p>
                
                <div class="flex justify-center py-10 md:justify-start">
                    <button id="solveChallengeBtn" class="bg-[#39A900] text-white py-2 px-6 rounded-lg focus:outline-none hover:bg-[#00314D] transition duration-300">
                        Quiero solucionar este reto
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Nueva Sección: Recursos -->
    <section class="bg-gray-100 py-10">
        <div class="container mx-auto px-5">
            <h2 class="title-font text-2xl md:text-3xl mb-6 font-medium text-gray-900 text-center">Recursos</h2>
            <div class="space-y-4">
                <a href="https://deyde.com/blog/normalizacion-datos/calidad-datos-sector-turistico/#:~:text=El%20uso%20de%20datos%20de,m%C3%A1s%20factible%20incrementar%20las%20conversiones." class="flex items-center text-indigo-500 hover:underline">
                    <img src="{{ asset('storage/img/course.png') }}" class="h-8 w-8 mr-2" alt="Documento 1">
                    Documento 1
                </a>
                <a href="https://dialnet.unirioja.es/servlet/articulo?codigo=7989251" class="flex items-center text-indigo-500 hover:underline">
                    <img src="{{ asset('storage/img/course.png') }}" class="h-8 w-8 mr-2" alt="Documento 2">
                    Documento 2
                </a>
                <a href="https://www.youtube.com/watch?v=62Uog--3Rc8" class="flex items-center text-indigo-500 hover:underline">
                    <img src="{{ asset('storage/img/course.png') }}" class="h-8 w-8 mr-2" alt="Video">
                    Video
                </a>
            </div>
        </div>
    </section>
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-xl font-bold mb-4">Acceso denegado</h2>
            <p>Aun no lo han habilitado para ser solucionador de este reto.</p>
            <button id="closeModal" class="mt-4 bg-gray-700 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
    </div>
    <script>
        document.getElementById('solveChallengeBtn').addEventListener('click', function () {
            const challengeId = {{ $challenge->id }};
            
            fetch(`/challenges/${challengeId}/solve`)
                .then(response => {
                    if (response.status === 403) {
                        // Mostrar el modal si el estado es 2
                        document.getElementById('modal').classList.remove('hidden');
                    } else {
                        // Redirigir al formulario de preguntas si el estado es 1
                        window.location.href = `/challenges/${challengeId}/form`;
                    }
                });
        });

        // Cerrar el modal
        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
</body>
</html>
