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
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
    <script src="https://unpkg.com/@yaireo/tagify"></script>
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
                                        <table class="min-w-full text-sm font-light table-auto">
                                            <thead class="border-b border-neutral-200 font-medium">
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
                                                        <tr class="border-b border-neutral-200 text-center">
                                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $challenge->id }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4 w-1/4">{{ $challenge->name }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4 w-1/4">{!! Str::limit($challenge->description, 40, '...') !!}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">Aqui va la imagen</td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <form action="{{ route('challenge.destroy', $challenge) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="bg-red-400 text-white p-2 rounded" onclick="return confirm('¿Estás seguro de eliminar este reto?');"><i class="fa fa-trash"></i></button>
                                                                    <a href="{{ route('challenge.edit', $challenge) }}" class="bg-gray-400 text-white p-2 rounded"><i class="fa fa-pen"></i></a>
                                                                </form>
                                                            </td>
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
                        <div id="modal-component-container"
                            class="hidden fixed inset-0 overflow-y-auto transition-opacity duration-300">
                            <div
                                class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="modal-bg-container h-full fixed inset-0 bg-gray-700 bg-opacity-75 z-0">
                                </div>
                                <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">
                                </div>
                                <div id="modal-container"
                                    class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all mt-12 sm:align-middle sm:max-w-lg w-full">
                                    <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4">
                                        <div class="modal-wrapper-flex sm:flex sm:items-start">
                                            <div
                                                class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-500 sm:mx-0 sm:h-10 sm:w-10">
                                                <i class="fa fa-flag fa-inverse"></i>
                                            </div>
                                            <div class="modal-content text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium text-gray-900">Agregar Reto</h3>
                                                <div class="modal-text">
                                                    <form action="{{ route('challenge.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div
                                                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                                                            <div class="-mx-3 md:flex mb-6">
                                                                <div class="md:w-full px-3">
                                                                    <label for="application-link"
                                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                                        Titulo
                                                                    </label>
                                                                    <input
                                                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                                        type="text" id="application-link"
                                                                        name="name" placeholder="Titulo del Reto">
                                                                </div>
                                                            </div>
                                                            <div class="-mx-3 md:flex mb-6">
                                                                <div class="md:w-full px-3">
                                                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="bootcam-select">
                                                                        Bootcamp
                                                                    </label>
                                                                    <select class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="bootcamp_id" id="bootcam-select">
                                                                        <option value="" disabled selected>- Selecciona el Bootcamp -</option>
                                                                        @foreach ($bootcamp as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="-mx-3 md:flex mb-6">
                                                                <div class="md:w-full px-3">
                                                                    <label
                                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                                                        for="application-link">
                                                                        Descripción
                                                                    </label>
                                                                    <textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="description"
                                                                        id="application-link" placeholder="Descripción"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="-mx-3 md:flex mb-6">
                                                                <div class="md:w-full px-3">
                                                                    <label
                                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                                                        for="application-link">
                                                                        Archivo
                                                                    </label>
                                                                    <input
                                                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                                        id="application-link" name="url"
                                                                        type="file">
                                                                </div>
                                                            </div>
                                                            <div class="-mx-3 md:flex mb-6">
                                                                <div class="md:w-full px-3">
                                                                    <div class="mb-1">
                                                                        <label for="tags"
                                                                            class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                                            Etiquetas
                                                                        </label>
                                                                        <select id="tags"
                                                                            class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                                            multiple>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-1">
                                                                        <label
                                                                            class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                                            Etiquetas seleccionadas
                                                                        </label>
                                                                        <div id="selected-tags-list"
                                                                            class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                                                        </div>
                                                                        <input type="hidden" id="selected-tags"
                                                                            name="tags[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <div class="links-container">
                                                                    <label
                                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2">Material
                                                                        de apoyo</label>
                                                                    <input type="url" name="links[]"
                                                                        id="link-1"
                                                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-2"
                                                                        placeholder="Ingresa un link">
                                                                </div>

                                                                <button type="button" id="add-link-button"
                                                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                                                    <i class="fa fa-plus"></i>Agregar otro link
                                                                </button>
                                                            </div>
                                                            <div
                                                                class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                <button type="submit"
                                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-green-500 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><i
                                                                        class="fa fa-plus"></i>Agregar</button>
                                                                <button type="button" id="closeModal"
                                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-red-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('error'))
                        <script>
                            console.error("{{ session('error') }}");
                        </script>
                    @endif

                    @if (session('success'))
                        <script>
                            console.log("{{ session('success') }}");
                        </script>
                    @endif
                </div>
            </section>
        </div>
    </main>
    <script>
        document.addEventListener('click', function(event) {
            if (event.target.id === 'openModal') {
                document.getElementById('modal-component-container').classList.remove('hidden');
            }
            if (event.target.id === 'closeModal') {
                document.getElementById('modal-component-container').classList.add('hidden');
            }
        });

        // Sección de los tags integrados
        document.addEventListener('DOMContentLoaded', function() {
            var tagsContainer = document.querySelector('#tags');
            var selectedTagsList = document.querySelector('#selected-tags-list');
            var selectedTags = [];

            // Cargar las etiquetas desde el servidor
            fetch('/tags')
                .then(response => response.json())
                .then(tags => {
                    tags.forEach(tag => {
                        var option = document.createElement('option');
                        option.value = tag.id;
                        option.textContent = tag.name;
                        tagsContainer.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al cargar los tags:', error));

            // Detectar cuando se seleccionan opciones
            tagsContainer.addEventListener('change', function() {
                var selectedOptions = Array.from(tagsContainer.selectedOptions);
                selectedOptions.forEach(option => {
                    if (!selectedTags.includes(option.value)) {
                        selectedTags.push(option.value);
                        renderSelectedTags(option.textContent, option.value);
                        console.log(selectedTags);
                    }
                });
            });

            // Mostrar las etiquetas seleccionadas con un botón para eliminarlas
            function renderSelectedTags(tagName, tagId) {
                console.log('ADDING TAGS', tagId);
                var tagItem = document.createElement('div');
                tagItem.classList.add('tag-item', 'flex', 'items-center', 'mb-2');
                tagItem.setAttribute('data-id', tagId);

                var tagLabel = document.createElement('span');
                tagLabel.textContent = tagName;
                tagLabel.classList.add('tag-label', 'bg-green-400', 'text-white', 'py-1', 'px-3', 'mr-2',
                'rounded');

                var removeButton = document.createElement('button');
                removeButton.textContent = 'Eliminar';
                removeButton.classList.add('remove-button', 'bg-red-400', 'text-white', 'px-2', 'rounded');
                removeButton.addEventListener('click', function() {
                    selectedTags = selectedTags.filter(id => id !== tagId);
                    tagItem.remove();
                    document.querySelector(`input[name="tags[]"][value="${tagId}"]`).remove();
                });

                tagItem.appendChild(tagLabel);
                tagItem.appendChild(removeButton);
                selectedTagsList.appendChild(tagItem);

                // Agregar un nuevo input hidden para cada etiqueta seleccionada
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'tags[]';
                hiddenInput.value = tagId;  // Aquí asegúrate de que este valor se está enviando correctamente
                document.querySelector('form').appendChild(hiddenInput);
                var listTags = document.getElementById('selected-tags');
                listTags.value = selectedTags;
            }
        });

        // Sección links dinamicos
        document.addEventListener('DOMContentLoaded', function() {
            var linksContainer = document.querySelector('.links-container');
            var addLinkButton = document.querySelector('#add-link-button');
            var linkCount = 1;

            // Función para agregar un nuevo campo de link
            addLinkButton.addEventListener('click', function() {
                linkCount++;

                // Crear un nuevo div que contendrá el input de link
                var newLinkDiv = document.createElement('div');
                newLinkDiv.classList.add('mb-1');

                // Crear el nuevo campo de input para el link
                var newLinkInput = document.createElement('input');
                newLinkInput.type = 'url';
                newLinkInput.id = `link-${linkCount}`;
                newLinkInput.name = 'links[]';
                newLinkInput.classList.add('w-full', 'bg-gray-200', 'text-black', 'border',
                    'border-gray-200', 'rounded', 'py-3', 'px-4', 'mb-1');
                newLinkInput.placeholder = `Ingresa un link ${linkCount}`;

                // Añadir el label y el input al nuevo div
                newLinkDiv.appendChild(newLinkInput);

                // Añadir el nuevo div al contenedor de links
                linksContainer.appendChild(newLinkDiv);
            });
        });

        // Guardar información en la base de datos
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault()

            var formData = new FormData(this)

            fetch('challenge.store', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Se han enviado sus datos correctamente: ', data);
                })
                .catch(error => {
                    console.error('Error: ', error);
                })
        })
    </script>
</body>

</html>
