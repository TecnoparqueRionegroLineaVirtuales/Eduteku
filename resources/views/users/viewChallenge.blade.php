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
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body>
    @include('components.nav-landing')
    <!-- Sección Superior: Imagen, Título, Descripción -->
    <section class="text-gray-600 p-10 body-font mt-24"> <!-- Añadido mt-24 para margen superior -->
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 w-full mb-8 md:mb-0">
                @php
                    $fileExtension = pathinfo($challenge->img_url, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                    <img class="object-cover object-center rounded-lg shadow-lg" alt="challenge image" src="{{ asset('storage/img/challenge/'.$challenge->img_url) }}">
                @elseif (in_array($fileExtension, ['mp4', 'mov', 'avi']))
                    <video class="object-cover object-center rounded-lg shadow-lg" controls>
                        <source src="{{ asset('storage/img/challenge/'.$challenge->img_url) }}" type="video/{{ $fileExtension }}">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <p>Unsupported file type</p>
                @endif
            </div>
            <div class="md:w-1/2 w-full md:pl-16 flex flex-col items-start text-center md:text-left">
                <h1 class="title-font text-3xl md:text-4xl mb-4 font-medium text-gray-900">{{ $challenge->name }}</h1>
                <div class="text-justify">{!! $challenge->description !!}</div>
            </div>
        </div>
    </section>
    <section class="text-gray-600 bg-gray-100 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex w-full mb-20 flex-wrap">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">Condiciones para solucionar el reto</h1>
                    <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">
                    Al postularte en este reto, te comprometes a participar activamente en todas las sesiones, workshops, y actividades que forman parte del programa. Este compromiso incluye asistir puntualmente a las masterclasses, completar las tareas asignadas, y colaborar de manera efectiva en la resolución de los retos que se te presenten.
                    Ser parte de este reto no solo implica recibir conocimientos, sino también contribuir con tus habilidades y esfuerzo para enfrentar desafíos reales. Como participante, asumirás la responsabilidad de ser un solucionador de retos, aplicando lo aprendido para desarrollar soluciones innovadoras y colaborando con tu equipo para alcanzar los objetivos planteados.
                    </p>
                </div>
                <!-- Swiper -->
                <div class="relative w-full z-0 max-w-full overflow-hidden">
                    <div class="swiper-container w-full">
                        <div class="swiper-wrapper">
                            @foreach($resources as $resource)
                            <div class="swiper-slide flex items-center justify-center bg-gray-200">
                                @if(Str::endsWith($resource->url_img, ['.jpg', '.jpeg', '.png', '.webp']))
                                    <img alt="gallery" class="object-cover w-full h-60 max-h-80" src="{{ asset('storage/challenge_resources/' . $resource->url_img) }}">
                                @elseif(Str::endsWith($resource->url_img, '.mp4'))
                                    <video class="object-cover w-full h-full max-h-80" controls>
                                        <source src="{{ asset('storage/challenge_resources/' . $resource->url_img) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination absolute bottom-4 left-0 right-0 flex justify-center"></div>
                        <!-- Add Navigation -->
                        <div class="swiper-button-next absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-gray-700 p-2 rounded-full cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"></path>
                            </svg>
                        </div>
                        <div class="swiper-button-prev absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-gray-700 p-2 rounded-full cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="flex justify-center py-20">
            <a id="solveChallengeBtn" class="bg-[#39A900] text-white py-4 px-12 rounded-lg focus:outline-none hover:bg-[#00314D] transition duration-300 text-lg">
                Quiero solucionar este reto
            </a>
        </div>
    <!-- Sección de Recursos -->
    <section class="bg-gray-100 py-10">
        <div class="container mx-auto px-5">
            <h2 class="title-font text-2xl md:text-3xl mb-6 font-medium text-gray-900 text-center">Recursos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($challenge->links as $link)
                    <div class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                        <img src="{{ asset('storage/img/resource_icon.png') }}" class="h-12 w-12 mb-4" alt="Recurso Icono">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Recurso</h3>
                        <a href="{{ $link->url }}" target="_blank" class="text-indigo-500 hover:underline break-all max-w-full">
                            {{ $link->url }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-xl font-bold mb-4">Acceso denegado</h2>
            <p>Aun no se a habilitado la solución de este reto.</p>
            <button id="closeModal" class="mt-4 bg-gray-700 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
    </div>
    <script>
        document.getElementById('solveChallengeBtn').addEventListener('click', function () {
            const challengeId = {{ $challenge->id }};
            
            fetch(`/challenges/${challengeId}/solve`)
                .then(response => {
                    if (response.status === 403) {
                        document.getElementById('modal').classList.remove('hidden');
                    } else if (response.status === 404) {
                        alert('El reto no se encontró.');
                    } else {
                        window.location.href = `/challenges/${challengeId}/form`;
                    }
                });
        });
        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('modal').classList.add('hidden');
        });

        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });

    </script>
</body>
</html>
