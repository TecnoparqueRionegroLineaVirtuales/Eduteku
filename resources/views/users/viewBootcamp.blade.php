<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <title>Bootcamps</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body>
    @include('components.nav-landing')
    <!-- Sección Superior: Imagen, Título, Descripción -->
    <section class="text-gray-600 p-10 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-2xl md:max-w-lg lg:w-full md:w-1/2 w-full mb-10 md:mb-0">
                    @if($bootcamp->video_url)
                        <!-- Mostrar video -->
                        <video class="object-cover object-center rounded-lg w-full h-80 md:h-auto" controls>
                            <source src="{{ asset('storage/img/'.$bootcamp->video_url) }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    @else
                        <!-- Mostrar imagen si no hay video -->
                        <img class="object-cover object-center rounded-lg w-full h-80 md:h-auto" alt="hero" src="{{ asset('storage/img/'.$bootcamp->img_url) }}">
                    @endif
                </div>
                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $bootcamp->name }}</h1>
                    <div class="text-justify">
                        <p class="mb-8 leading-relaxed">{!! $bootcamp->description !!}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-gray-600 bg-gray-100 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex w-full mb-20 flex-wrap">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">Descubre Nuestro Bootcamp</h1>
                    <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">
                        Nuestro bootcamp está diseñado para proporcionarte habilidades prácticas y conocimientos actualizados que te prepararán para los retos. A través de videos y recursos visuales, podrás explorar en detalle los contenidos del programa, conocer a los instructores y obtener una visión clara de lo que te espera.
                    </p>
                </div>
                <!-- Swiper -->
                <div class="relative w-full max-w-full overflow-hidden">
                    <div class="swiper-container w-full">
                        <div class="swiper-wrapper">
                            @foreach($resources as $resource)
                            <div class="swiper-slide flex items-center justify-center bg-gray-200">
                                @if(Str::endsWith($resource->url_img, ['.jpg', '.jpeg', '.png', '.webp']))
                                    <img alt="gallery" class="object-cover w-full h-60 max-h-80" src="{{ asset('storage/bootcamp_resources/' . $resource->url_img) }}">
                                @elseif(Str::endsWith($resource->url_img, '.mp4'))
                                    <video class="object-cover w-full h-full max-h-80" controls>
                                        <source src="{{ asset('storage/bootcamp_resources/' . $resource->url_img) }}" type="video/mp4">
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
                <div class="flex justify-center py-20">
                    <a href="{{ route('bootcamp_participation', $bootcamp->id ) }}" class="bg-[#39A900] text-white py-4 px-12 rounded-lg focus:outline-none hover:bg-[#00314D] transition duration-300 text-lg">
                        Quiero participar de este Bootcamp
                    </a>
                </div>
            </div>
        </section>
        <section class="text-gray-600 p-10 body-font">
            <h2 class="text-2xl font-bold mb-4 text-center">Retos relacionados</h2>
            <div class="container mx-auto px-5">
                <div class="flex flex-wrap -m-4">
                    @if(!empty($challenges) && $challenges->count() > 0)
                        @foreach($challenges as $challenge)
                            <div class="p-4 w-full sm:w-1/2 md:w-1/3">
                                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                    <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/img/challenge/'.$challenge->img_url) }}" alt="bootcamp">
                                    <div class="p-6">
                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $challenge->name }}</h1>
                                        <p class="leading-relaxed mb-3">{{ Str::limit(strip_tags($challenge->description), 100, '...') }}</p>
                                        <div class="flex items-center flex-wrap">
                                            <a href="{{ route('viewChallenge', $challenge->id) }}" class="text-green-500 inline-flex items-center md:mb-2 lg:mb-0">Más detalles
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center w-full">No hay retos relacionados disponibles en este momento.</p>
                    @endif
                </div>
            </div>
        </section>

    <section class="bg-gray-100 py-12">
    <div class="container mx-auto">
            <!-- Patrocinadores -->
            <h2 class="text-2xl font-bold mb-4 text-center">Instituciones participantes</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach($sponsors as $sponsor)
                    @if($sponsor->description)
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 flex items-center justify-center">
                            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center justify-between mx-auto max-w-xs h-full">
                                <img class="h-32 w-auto object-contain mb-4" src="{{ asset('storage/img/'.$sponsor->img_url) }}" alt="{{ $sponsor->name }}">
                                <h3 class="text-lg font-semibold text-center">{{ $sponsor->name }}</h3>
                                <p class="text-sm text-gray-500 mt-2 text-center">{{ $sponsor->description }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
           <!-- Sección de más aliados -->
            @if($sponsors->where('description', null)->isNotEmpty())
                <h2 class="text-2xl font-bold mt-16 mb-4 text-center">Más Aliados</h2>
                <div class="flex flex-wrap justify-center gap-8">
                    @foreach($sponsors as $sponsor)
                        @if(!$sponsor->description)
                            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/6 xl:w-1/8 flex items-center justify-center">
                                <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center justify-center mx-auto max-w-xs h-full">
                                    <img class="h-20 w-auto object-contain mb-2" src="{{ asset('storage/img/'.$sponsor->img_url) }}" alt="{{ $sponsor->name }}">
                                    <h3 class="text-sm font-semibold text-center">{{ $sponsor->name }}</h3>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            </div>
    </section>
    <section class="text-gray-600 p-10 body-font">
        <!-- Sección combinada de Criterios de Aceptación y Curso -->
        <div class="flex flex-col lg:flex-row justify-center items-center mt-8 gap-8">
            <!-- Tarjeta de Criterios de Aceptación -->
            <div class="bg-gray-200 shadow-lg rounded-lg p-6 lg:w-1/2 text-center">
                <h2 class="text-2xl font-bold mb-4">Criterios de Aceptación</h2>
                @if($bootcamp->file)
                    <a href="{{ asset('storage/pdf/'.$bootcamp->file) }}" download class="text-indigo-500 hover:underline flex items-center justify-center gap-2">
                        <img src="{{ asset('storage/img/iconoPDF.png') }}" class="h-8 w-auto">
                        Descargar PDF
                    </a>
                @endif
            </div>
            <!-- Tarjeta de Curso -->
            <div class="bg-gray-200 shadow-lg rounded-lg p-6 lg:w-1/2 text-center">
                <h2 class="text-2xl font-bold mb-4">Curso</h2>
                @if($bootcamp->url_course)
                    <a href="{{ $bootcamp->url_course }}" class="text-indigo-500 hover:underline flex items-center justify-center gap-2">
                        <img src="{{ asset('storage/img/course.png') }}" class="h-8 w-auto">
                        Ir al curso relacionado.
                    </a>
                @endif
            </div>
        </div>
    </section>
    <script>
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
