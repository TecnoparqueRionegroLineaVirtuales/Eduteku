<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preguntas de turismo:</title>
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    @include('components.nav-header-dashboard')

    <main>
        <div class="flex flex-col md:flex-row">
            @include('components.nav-dashboard')
            <section class="w-full">
                <div id="main" class="main-content mt-12 md:mt-2 pb-24 md:pb-5">
                    <div class="bg-gray-100 pt-3">
                        <div
                            class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-green-500 p-4 shadow text-2xl text-current">
                            <h1 class="font-bold pl-2">Tipos de encuesta</h1>
                        </div>
                    </div>

                    <div class="overflow-hidden px-4 sm:px-12">
                        <table class="min-w-full text-center text-sm font-light text-surface">
                            <thead class="border-b border-neutral-200 font-medium">
                                <tr class="border-b border-neutral-200">
                                    <th scope="col" class="px-6 py-4">Formulario (bootcamp)</th>
                                    <th scope="col" class="px-6 py-4 hidden sm:block">N° preguntas</th>
                                    <th scope="col" class="px-6 py-4">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bootcamps as $bootcamp)
                                    <tr>
                                        <td> {{ $bootcamp->name }} </td>
                                        <td class="hidden sm:block  whitespace-nowrap px-6 py-4 mt-2"> {{ $bootcamp->questions_count }} </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('bootcamp.challengeSurvey', $bootcamp->id) }}" class="bg-gray-400 text-white p-2 rounded">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
