<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Reto</title>
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Vite CSS -->
    @vite('resources/css/app.css')

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/s6qrwphproqqpe62ildiadgce0foysc6oj7rtn50ilp2fibo/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    <header>
        @include('components.nav-header-dashboard')
    </header>
    <main>
        @include('components.nav-dashboard')

        <div id="modal-component-container" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-700 bg-opacity-75"></div>
                <div class="hidden sm:inline-block sm:align-middle sm:h-screen"></div>
                <div id="modal-container"
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4 max-h-[80vh] overflow-y-auto">
                        <div class="sm:flex sm:item-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-500 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="fa fa-flag fa-2x fa-inverse"></i>
                            </div>
                            <div class="text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium text-gray-900">Editar Reto</h3>
                                <div>
                                    <form action="{{ route('challenge.update', $challenge->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                                            <div class="-mx-3 md:flex mb-6">
                                                <div class="md:w-full px-3">
                                                    <label for="name"
                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                        Titulo
                                                    </label>
                                                    <input
                                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                        type="text" id="name" name="name"
                                                        placeholder="Titulo del Reto" value="{{ $challenge->name }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-6">
                                                <div class="md:w-full px-3">
                                                    <label
                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                                        for="bootcam-select">
                                                        Bootcamp
                                                    </label>
                                                    <select
                                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                        name="bootcamp_id" id="bootcam-select"
                                                        aria-label="Selecciona el Bootcamp">
                                                        <option value="">- Selecciona el Bootcamp -</option>
                                                        @foreach ($bootcamps as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $challenge->bootcamp_id == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-6">
                                                <div class="md:w-full px-3">
                                                    <label
                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                                        for="description">
                                                        Descripción
                                                    </label>
                                                    <textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="description"
                                                        id="description" placeholder="Descripción">{{ $challenge->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-6">
                                                <div class="md:w-full px-3">
                                                    <label
                                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                                        for="url">
                                                        Archivo
                                                    </label>
                                                    <input
                                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                        id="url" name="url" type="file">
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-6">
                                                <div class="md:w-full px-3">
                                                    <div class="mb-1">
                                                        <label for="tags"
                                                            class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                            Etiquetas
                                                        </label>
                                                        <select
                                                            class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                                            name="tags[]" id="tags" multiple
                                                            aria-label="Selecciona las Etiquetas">
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->id }}"
                                                                    @if (in_array($tag->id, $challengeTags)) selected @endif>
                                                                    {{ $tag->name }}
                                                                </option>
                                                            @endforeach
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
                                                        <input type="hidden" id="selected-tags" name="tags[]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                @if (count($challengeTags) > 0)
                                                    <h1>Hay conexiones</h1>
                                                @else
                                                    <h1>No hay nada</h1>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <div class="links-container">
                                                    @foreach ($links as $index => $link)
                                                        <div class="mb-1 relative">
                                                            <input type="url" name="links[]"
                                                                value="{{ $link->url }}"
                                                                id="link-{{ $index + 1 }}"
                                                                class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-1"
                                                                placeholder="Ingresa un link {{ $index + 1 }}">
                                                            <button type="button"
                                                                class="absolute top-0 right-0 bg-red-500 text-white px-2 py-1 rounded mt-2 mr-2 remove-link-button"
                                                                data-index="{{ $index + 1 }}">Eliminar</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button type="button" id="add-link-button"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                                    <i class="fa fa-plus"></i> Agregar otro link
                                                </button>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="submit"
                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-green-500 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                    <i class="fa fa-pen"></i>Actualizar
                                                </button>
                                                <!-- <a href="">
                                                    <button type="button" id="closeModal"
                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-red-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Cancelar
                                                    </button>
                                                </a> -->
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
    </main>
    <!-- JavaScript para manejo de tags -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tagsContainer = document.querySelector('#tags');
            var selectedTagsList = document.querySelector('#selected-tags-list');
            var selectedTags = Array.from(tagsContainer.selectedOptions).map(option => option.value);

            tagsContainer.addEventListener('change', function() {
                var selectedOptions = Array.from(tagsContainer.selectedOptions);
                selectedOptions.forEach(option => {
                    if (!selectedTags.includes(option.value)) {
                        selectedTags.push(option.value);
                        renderSelectedTags(option.textContent, option.value);
                    }
                });
            });

            function renderSelectedTags(tagName, tagId) {
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

                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'tags[]';
                hiddenInput.value = tagId;
                document.querySelector('form').appendChild(hiddenInput);
            }
        });

        // Sección links dinamicos
        document.addEventListener('DOMContentLoaded', function() {
            var linksContainer = document.querySelector('.links-container');
            var addLinkButton = document.querySelector('#add-link-button');
            var linkCount = document.querySelectorAll('.links-container input').length;

            // Función para agregar un nuevo campo de link
            addLinkButton.addEventListener('click', function() {
                linkCount++;

                // Crear un nuevo div que contendrá el input de link y el botón de eliminar
                var newLinkDiv = document.createElement('div');
                newLinkDiv.classList.add('mb-1', 'relative');

                // Crear el nuevo campo de input para el link
                var newLinkInput = document.createElement('input');
                newLinkInput.type = 'url';
                newLinkInput.id = `link-${linkCount}`;
                newLinkInput.name = 'links[]';
                newLinkInput.classList.add('w-full', 'bg-gray-200', 'text-black', 'border',
                    'border-gray-200', 'rounded', 'py-3', 'px-4', 'mb-1');
                newLinkInput.placeholder = `Ingresa un link ${linkCount}`;

                // Crear el botón de eliminar
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('absolute', 'top-0', 'right-0', 'bg-red-500', 'text-white',
                    'px-2', 'py-1', 'rounded', 'mt-2', 'mr-2');
                removeButton.textContent = 'Eliminar';
                removeButton.addEventListener('click', function() {
                    newLinkDiv.remove();
                });

                // Añadir el input y el botón al nuevo div
                newLinkDiv.appendChild(newLinkInput);
                newLinkDiv.appendChild(removeButton);

                // Añadir el nuevo div al contenedor de links
                linksContainer.appendChild(newLinkDiv);
            });

            // Manejo de botones de eliminación de links existentes
            linksContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-link-button')) {
                    event.target.parentElement.remove();
                }
            });
        });
    </script>
</body>

</html>
