<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Recursos del Bootcamp</title>
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tiny.cloud/1/s6qrwphproqqpe62ildiadgce0foysc6oj7rtn50ilp2fibo/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    <header>
        @include('components.nav-header-dashboard')
    </header>
    <main>
        @include('components.nav-dashboard')
        <div id="modal-component-container" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
                <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen"></div>
                <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4 max-h-[80vh] overflow-y-auto">
                        <div class="modal-wrapper-flex sm:flex sm:item-start">
                            <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-500  sm:mx-0 sm:h-10 sm:w-10">
                                <i class="fa fa-chalkboard-teacher fa-2x fa-inverse"></i>
                            </div>
                            <div class="modal-content text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium text-gray-900">Seleccion de imágenes y videos</h3>
                                <div class="modal-text">             
                                    <form action="{{ route('bootcamp_resources.update', $bootcamp->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT') <!-- Especifica que el método HTTP es PUT -->
                                        <div class="form-group">
                                            <label for="files">Selecciona Archivos (imágenes o videos):</label>
                                            <input type="file" name="files[]" id="files" accept="image/*,video/*" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" multiple required>
                                        </div>
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-green-500 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><i class="fa fa-plus"></i> Subir Archivos</button>
                                        <a href="{{ route('bootcampLanding') }}">
                                            <button type="button" id="closeModal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-red-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">No quiero cambiar imagenes</button>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Inicializar TinyMCE
        tinymce.init({
            selector: '#description',
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | forecolor backcolor | link image media | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
        });

        document.getElementById('addSponsor').addEventListener('click', function() {
            const sponsorSelect = document.getElementById('sponsor-select');
            const sponsorList = document.getElementById('sponsor-list');
            const selectedSponsorId = sponsorSelect.value;
            const selectedSponsorName = sponsorSelect.options[sponsorSelect.selectedIndex].text;

            if (selectedSponsorId) {
                if (document.querySelector(`input[name="sponsors[]"][value="${selectedSponsorId}"]`)) {
                    alert('Este patrocinador ya ha sido agregado.');
                    return;
                }

                const sponsorItem = document.createElement('div');
                sponsorItem.className = 'flex justify-between items-center mb-2';
                sponsorItem.innerHTML = `
                    <span>${selectedSponsorName}</span>
                    <button type="button" class="removeSponsor bg-red-500 text-white p-1 rounded ml-2" data-id="${selectedSponsorId}">
                        <i class="fa fa-trash"></i>
                    </button>
                `;
                
                sponsorList.appendChild(sponsorItem);

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'sponsors[]';
                hiddenInput.value = selectedSponsorId;
                hiddenInput.id = `sponsor-input-${selectedSponsorId}`;
                sponsorList.appendChild(hiddenInput);

                sponsorSelect.value = '';
            }
        });

        document.getElementById('sponsor-list').addEventListener('click', function(e) {
            if (e.target.closest('.removeSponsor')) {
                const sponsorId = e.target.closest('.removeSponsor').getAttribute('data-id');
                document.getElementById(`sponsor-input-${sponsorId}`).remove();
                e.target.closest('.removeSponsor').parentElement.remove();
            }
        });
    </script>
</body>
</html>
