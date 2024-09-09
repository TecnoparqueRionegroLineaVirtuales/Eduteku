<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <title>Retos</title>
    @vite('resources/css/app.css')
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    @include('components.nav-header-dashboard')
    <main>
        <div class="flex flex-col md:flex-row">
            @include('components.nav-dashboard')
            <section class="w-full">
                <div id="main" class="main-content mt-12 md:mt-2 pb-24 md:pb-5">
                    {{-- Titulo Sección --}}
                    <div class="bg-gray-100 pt-3">
                        <div
                            class="bg-gradient-to-r from-gray-100 to-green-500 p-4 shadow text-2xl text-current rounded-tl-3xl ml-1">
                            <h1 class="font-bold pl-2">
                                Retos - Administrador
                            </h1>
                        </div>
                    </div>
                    {{-- Sección retos --}}
                    <div class="pt-10 p-10">
                        <button id="openModal"
                            class="inline-flex items-center bg-green-500 border-0 py-2 px-4 rounded-md focus:outline-none hover:text-white text-base mt-4 md:mt-0 hover:-translate-y-1 hover:shadow-lg active:translate-y-0 active:bg-green-400">Crear
                            Reto</button>
                    </div>
                    <div class="flex flex-wrap w-full py-10 px-8 lg:px-10 shadow-xl mb-24">
                        {{-- Tabla de retos --}}
                        <div class="flex flex-col w-full">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-sm font-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">#</th>
                                                    <th scope="col" class="px-6 py-4">Nombre</th>
                                                    <th scope="col" class="px-6 py-4">Descripción</th>
                                                    <th scope="col" class="px-6 py-4">Imagen</th>
                                                    <th scope="col" class="px-6 py-4">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($challenges && count($challenges) > 0)
                                                    @foreach ($challenges as $challenge)
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="border-y-2 border-neutral-300">
                                                        <td class="text-center whitespace-nowrap py-4" colspan="5">No
                                                            se han encontrado datos relacionados</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal registro retos --}}
                        <div id="modal-component-container" class="hidden fixed inset-0 overflow-y-auto">
                            <div
                                class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                            >
                                <div class="modal-bg-container h-full fixed inset-0 bg-gray-700 bg-opacity-75 z-0"></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('modal-component-container').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modal-component-container').classList.add('hidden');
        });
    </script>
</body>

</html>
