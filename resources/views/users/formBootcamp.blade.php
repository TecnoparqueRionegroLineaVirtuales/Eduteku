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
    <!-- Agregar jQuery para manipulación de modal -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    @include('components.nav-landing')

    <section class="text-gray-600 body-font py-12 mt-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-start md:items-center">
            <div class="lg:w-3/5 sm:m-10 md:w-1/2 md:pr-16 lg:pr-8 pr-0 mb-10 md:mb-0">
                <h1 class="title-font font-medium text-3xl text-gray-900">Diligencia el siguiente formulario para participar en nuestro bootcamp</h1>
                <p class="leading-relaxed mt-4 text-lg text-justify">Al completar esta información, podrás participar en todas las masterclass y cursos dispuestos en Eduteku. Los cupos son limitados para ser solucionador de retos.</p>
            </div>

            <!-- Mostrar mensaje si el usuario ya está registrado -->
            @if($isRegistered)
                <div class="lg:w-2/6 md:w-1/2 w-full bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto">
                    <h2 class="text-gray-900 text-xl font-medium title-font mb-5">Ya estás registrado en este bootcamp</h2>
                    <p class="leading-relaxed mt-4 text-lg text-justify">Gracias por tu interés. Ya estás registrado en este bootcamp y tu participación ha sido confirmada.</p>
                </div>
            @else
                <!-- Formulario -->
                <div class="lg:w-2/6 md:w-1/2 w-full bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto">
                    <h2 class="text-gray-900 text-xl font-medium title-font mb-5">Compromiso del Participante</h2>
                    <form id="bootcampForm" method="post" action="{{ route('bootcamp_participation.store', $bootcamp->id) }}">
                        @csrf
                        
                        <div class="relative mb-4">
                            <p class="leading-7 text-sm text-justify text-gray-600 mb-2">
                                Al postularte en este bootcamp, te comprometes a participar activamente en todas las sesiones, workshops, y actividades que forman parte del programa. Este compromiso incluye asistir puntualmente a las masterclasses, completar las tareas asignadas, y colaborar de manera efectiva en la resolución de los retos que se te presenten.
                                Ser parte de este bootcamp no solo implica recibir conocimientos, sino también contribuir con tus habilidades y esfuerzo para enfrentar desafíos reales. Como participante, asumirás la responsabilidad de ser un solucionador de retos, aplicando lo aprendido para desarrollar soluciones innovadoras y colaborando con tu equipo para alcanzar los objetivos planteados.
                            </p>
                            <p class="leading-7 text-sm text-gray-600 mb-2">
                                ¿Te comprometes a participar activamente en todo el bootcamp?
                            </p>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="commitment" value="Si" required class="form-radio text-indigo-600">
                                    <span class="ml-2">Sí</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="commitment" value="No" required class="form-radio text-indigo-600">
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="text-white bg-[#39A900] border-0 py-2 px-8 focus:outline-none hover:bg-[#00314D] rounded text-lg mt-4">Postularme</button>
                    </form>
                </div>
            @endif
        </div>
    </section>


        <!-- Modal de confirmación -->
    <div id="confirmationModal" class="fixed inset-0 hidden z-50 overflow-y-auto bg-gray-900 bg-opacity-75">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Registro exitoso</h3>
                <p class="mt-2 text-sm text-gray-600">Te has registrado exitosamente en el bootcamp. Serás redirigido a la página inicial.</p>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button id="closeModalSuccess" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#39A900] text-base font-medium text-white hover:bg-[#00314D] sm:w-auto sm:text-sm">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de negación -->
    <div id="denialModal" class="fixed inset-0 hidden z-50 overflow-y-auto bg-gray-900 bg-opacity-75">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Registro denegado</h3>
                <p class="mt-2 text-sm text-gray-600">No aceptaste los compromisos del bootcamp. No puedes registrarte.</p>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button id="closeModalError" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 sm:w-auto sm:text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#bootcampForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#confirmationModal').removeClass('hidden');
                            $('#closeModalSuccess').on('click', function() {
                                window.location.href = "{{ route('bootcampClient') }}";
                            });
                        } else if (response.error) {
                            $('#denialModal').removeClass('hidden');
                            $('#closeModalError').on('click', function() {
                                $('#denialModal').addClass('hidden');
                            });
                        }
                    },
                    error: function(error) {
                        console.error('Error al registrar la participación:', error);
                    }
                });
            });
        });
    </script>

</body>
</html>
