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
                            <h1 class="font-bold pl-2">Formulario {{ $challengeType->name }}</h1>
                        </div>
                    </div>
                    {{-- success/error messages --}}
                    @if (session('success'))
                        <div id="flash-sucess" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Cerrar</title>
                                    <path
                                        d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.414l-2.93 2.435a1 1 0 1 1-1.244-1.562l3.333-2.778a1 1 0 0 1 1.244 0l3.333 2.778a1 1 0 0 1 0 1.562z" />
                                </svg>
                            </span>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Error!</strong>
                            @foreach ($errors->all() as $error)
                                <span class="block sm:inline">{{ $error }}</span>
                            @endforeach
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Cerrar</title>
                                    <path
                                        d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.414l-2.93 2.435a1 1 0 1 1-1.244-1.562l3.333-2.778a1 1 0 0 1 1.244 0l3.333 2.778a1 1 0 0 1 0 1.562z" />
                                </svg>
                            </span>
                        </div>
                    @endif
                    <div class="pt-10 py-10 px-10">
                        <button id="openModal"
                            class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-500 text-white rounded text-base mt-4 md:mt-0">
                            Agregar Inicio</button>
                    </div>
                    <div class="overflow-hidden px-4 sm:px-12">
                        <table class="min-w-full text-center text-sm font-light text-surface">
                            <thead class="border-b border-neutral-200 font-medium">
                                <tr class="border-b border-neutral-200">
                                    <th scope="col" class="px-6 py-4">Pregunta</th>
                                    <th scope="col" class="px-6 py-4 hidden sm:block">Tipo</th>
                                    <th scope="col" class="px-6 py-4">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($challengeType->questions as $question)
                                    <tr>
                                        <td> {{ $question->content }} </td>
                                        <td class="hidden sm:block"> {{ $question->questionType->name }} </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('surveyQuestions', $question->id) }}"
                                                class="bg-gray-400 text-white p-2 rounded">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- modal --}}
                    <div id="modal-component-container" class="hidden fixed inset-0 overflow-y-auto">
                        <div
                            class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
                            <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen"></div>
                            <div id="modal-container"
                                class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all mt-12 sm:align-middle sm:max-w-lg w-full">
                                <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4">
                                    <div class="modal-wrapper-flex sm:flex sm:item-start">
                                        <div class="modal-content text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg font-medium text-gray-900 mb-8">Agregar Pregunta</h3>
                                            <form action="{{ route('challengeQuestions.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input name="challenge-type" type="hidden"
                                                    value={{ $challengeType->id }}>
                                                <div class="md:w-full px-3">
                                                    <label
                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                                        for="question-type">
                                                        Typo de pregunta:
                                                    </label>
                                                    <select name="question-type" id="question-typpe">
                                                        @foreach ($questionTypes as $questionType)
                                                            <option value={{ $questionType->id }}>
                                                                {{ $questionType->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="md:w-full px-3">
                                                    <label
                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                                        for="question-content">
                                                        Enunciado de la pregunta:
                                                    </label>
                                                    <input
                                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                        id="question-content" type="text" name="question-content"
                                                        placeholder="Enunciado">
                                                </div>
                                                <div
                                                    class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button type="submit"
                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-green-500 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><i
                                                            class="fa fa-plus"></i>Agregar</button>
                                                    <button type="button" id="closeModal"
                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-red-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
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


        //TODO: Hide the message(success/error) after some seconds..
        if (document.getElementById('flash-sucess')){
            setTimeout(function(){
                console.log('fired hide');
                document.getElementById('flash-success').classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
