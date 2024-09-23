<nav class=" fixed top-0 left-0 right-0 z-50 dark:bg-gray-900">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-3 ">

        <!-- nav lateral-desplegable -->
        <div id="drawer-navigation"
            class="mt-4 fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-gray-100 w-64 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-navigation-label">
            <div class="flex flex-1 justify-center md:justify-start text-current">
                <a href="{{ route('dashboard') }}" aria-label="Home">
                    <img class="h-20" src="{{ asset('storage/img/logosena.png') }}" alt="logo" />
                </a>
            </div>
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">

                    <!-- Configuración-->
                    @role('admin')
                    <li id="dropdownTecnoparquButton" data-toggle-menu="dropdown-Configuración" type="button"
                        class="relative">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-tecnoparque" data-collapse-toggle="dropdown-tecnoparque">
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Configuración</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d=" m1
                                  1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <ul id="dropdown-Configuración" class="hidden py-2 space-y-2 ml-9">
                            <li class=" flex-1">
                                <a href="{{ route('category.index') }}"
                                    class=" block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fa fa-layer-group pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current  md:inline-block">Categorías</span>
                                </a>
                            </li>
                            <li class="flex-1">
                                <a href="{{ route('state.index') }}"
                                    class=" block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fas fa-toggle-on pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0  md:text-base text-current md:text-current  md:inline-block">Estados</span>
                                </a>
                            </li>
                            <li class=" flex-1">
                                <a href="{{ route('user.index') }}"
                                    class=" block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fas fa-users pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Usuarios</span>
                                </a>
                            </li>

                            <li class="flex-1">
                                <a href="{{ route('messages.index') }}"
                                    class=" block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fa fa-envelope pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Mensajes</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Tecnoparque -->
                    <li id="dropdownTecnoparquButton" data-toggle-menu="dropdown-Tecnoparque" type="button"
                        class="relative">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-tecnoparque" data-collapse-toggle="dropdown-tecnoparque">
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Tecnoparque</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d=" m1
                                  1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <ul id="dropdown-Tecnoparque" class="hidden py-2 space-y-2 ml-9">
                            <li class=" flex-1">
                                <a href="{{ route('home.index') }}"
                                    class=" block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fa fa-home pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current  md:inline-block">Inicio</span>
                                </a>
                            </li>
                            <li class="ml-2 flex-1">
                                <a href="{{ route('panelInfo') }}"
                                    class=" block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fa fa-info pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current  md:inline-block">Info</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Difución -->
                    <li id="dropdownTecnoparquButton" data-toggle-menu="dropdown-Difución" type="button"
                        class="relative">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-tecnoparque" data-collapse-toggle="dropdown-tecnoparque">
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Difución</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d=" m1
                                  1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <ul id="dropdown-Difución" class="hidden py-2 space-y-2 ml-9">
                            <li class=" flex-1">
                                <a href="{{ route('panelEdt') }}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fa fa-play pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">EDT</span>
                                </a>
                            </li>
                            <li class=" flex-1">
                                <a href="{{ route('panelBulletin') }}"
                                    class=" block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fa fa-book pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Boletin</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- innovación abierta -->
                    <li id="dropdownTecnoparquButton" data-toggle-menu="dropdown-innovación-abierta" type="button"
                        class="relative">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-tecnoparque" data-collapse-toggle="dropdown-tecnoparque">
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">innovación abierta</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d=" m1
                                  1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <ul id="dropdown-innovación-abierta" class="hidden py-2 space-y-2 ml-9">
                            <li class=" flex-1">
                                <a href="{{ route('challenge.dashboard') }}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fas fa-users pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Retos</span>
                                </a>
                            </li>
                            <li class="flex-1">
                                <a href="{{ route('bootcamp.index') }}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500 hover:border-green-500">
                                    <i class="fa fa-chalkboard-teacher pr-0 md:pr-3"></i><span
                                    class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Bootcamp</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="flex-1">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-white hover:text-green-500">
                            <i class="fa fa-envelope pr-0 md:pr-3"></i><span
                            class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Formulario</span>
                        </a>
                    </li>

                    <p class="mt-4 border-t-2 border-gray-300"></p>
                        <li class="px-2 ">
                            <a href="{{ route('index.index') }}">
                                <button
                                    class=" text-green-500 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none inline-block py-2 px-4 text-current no-underline hover:text-green-600 text-left md:text-center">
                                    <i class="fas fa-globe fa-fw"></i>
                                    Regresar al portal web
                                </button>
                            </a>
                        </li>
                        <li class="px-2 ">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class=" text-red-500 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none inline-block py-2 px-4 text-current no-underline hover:text-red-600"
                                    type="submit">
                                    <i class="fas fa-sign-out-alt fa-fw "></i>
                                    Cerrar sesión
                                </button>
                            </form>
                        </li>
                        @endrole
                    @role('user')
                    <li class="flex-1">
                        <a href="{{ route('likeUser') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-100 dark:text-white hover:text-green-500 hover:border-green-500">
                            <i class="fa fa-chalkboard-teacher pr-0 md:pr-3"></i><span
                            class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Mis like</span>
                        </a>
                    </li>

                    <li class="flex">
                        <form action="https://moodle.eduteku.com/test/index.php" method="post" class=" hover:text-green-500">
                            <input type="hidden" value="{{ $email }}" name="email">
                            <input type="hidden" value="{{ $password }}" name="password">
                            <button type="submit" id="loginbtn">
                                <i class="fa fa-chalkboard-teacher pr-0 md:pr-3"></i>
                                <span
                                    class="py-1 md:py-3 pl-1 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">
                                    Realizar cursos
                                </span>
                            </button>
                        </form>
                    </li>
                        <p class="mt-4 border-t-2 border-gray-300"></p>
                    <li class="px-2 ">
                        <a href="{{ route('index.index') }}">
                            <button
                                class=" text-green-500 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none inline-block py-2 px-4 text-current no-underline hover:text-green-600 text-left md:text-center">
                                <i class="fas fa-globe fa-fw"></i>
                                Regresar al portal web
                            </button>
                        </a>
                    </li>
                    <li class="px-2 ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class=" text-red-500 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none inline-block py-2 px-4 text-current no-underline hover:text-red-600"
                                type="submit">
                                <i class="fas fa-sign-out-alt fa-fw "></i>
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                    @endrole
                    </ul>
                </div>
            </div>
    </nav>


    <!-- nav lateral-->
    <nav aria-label="alternative nav" class="hidden md:flex">
        <div class="bg-gray-100 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen w-full md:w-48 content-center">
            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                    @role('admin')
                    <li class="mr-3 m-3">
                        <li class="mr-3 flex-1">
                            <a href="{{ route('category.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fa fa-layer-group pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Categorías</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route('state.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fas fa-toggle-on pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Estados</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route('home.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fa fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Inicio</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route ('panelInfo') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fa fa-info pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Info</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route('panelEdt') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fa fa-play pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">EDT</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route('panelBulletin') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fa fa-book pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Boletin</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route('bootcamp.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fa fa-chalkboard-teacher pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Bootcamp</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route ('user.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fas fa-users pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Usuarios</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route ('messages.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                                <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Mensajes</span>
                            </a>
                        </li>
                        <li class=" flex-1">
                            <a href="{{ route('challenge.dashboard') }}"
                                class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800 dark:text-black hover:text-green-500 hover:border-green-500">
                                <i class="fas fa-users pr-0 md:pr-3"></i><span
                                class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">Retos</span>
                            </a>
                        </li>
                    @endrole

                    @role('user')
                    <li class="mr-3 m-3">
                        <a href="{{ route('likeUser') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2  dark:border-gray-800dark:text-black hover:text-green-500 hover:border-green-500">
                            <i class="fa fa-heart pr-0 md:pr-3"></i><span
                                class="ml-4 pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">
                                Mis like
                            </span>
                        </a>
                    </li>
                    <li class="mr-3 m-3">
                        <form action="https://moodle.eduteku.com/test/index.php" method="post" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 dark:border-gray-800  dark:text-black hover:text-green-500 hover:border-green-500">
                            <input type="hidden" value="{{ $email }}" name="email">
                            <input type="hidden" value="{{ $password }}" name="password">
                            <button type="submit" id="loginbtn">
                                <i class="fa fa-chalkboard-teacher pr-0 md:pr-3"></i>
                                <span
                                    class=" pb-1 md:pb-0 md:text-base text-current md:text-current md:inline-block">
                                    Realizar cursos
                                </span>
                            </button>
                        </form>
                    @endrole
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-30"></div>
    <script>
        //activa y desactiva el <!-- Dropdown menu top -->
        function closeAllDropdowns() {
            document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                menu.classList.add('hidden');
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButtons = document.querySelectorAll('[data-dropdown-toggle]');

            dropdownButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const dropdownId = this.getAttribute('data-dropdown-toggle');
                    const dropdownMenu = document.getElementById(dropdownId);

                    if (dropdownMenu.classList.contains('hidden')) {
                        closeAllDropdowns();
                        dropdownMenu.classList.remove('hidden');
                    } else {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            });
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('[data-dropdown-toggle]') && !event.target.closest('.dropdown-menu')) {
                closeAllDropdowns();
            }
        });

        //activa y desactiva el <!--menu lateral -->
        document.addEventListener('DOMContentLoaded', function() {
            const drawer = document.getElementById('drawer-navigation');
            const showDrawerButton = document.querySelector('[data-drawer-show]');
            const hideDrawerButton = document.querySelector('[data-drawer-hide]');

            // Mostrar el drawer
            showDrawerButton.addEventListener('click', function() {
                drawer.classList.remove('-translate-x-full');
                drawer.classList.add('translate-x-0');
            });

            // Ocultar el drawer
            hideDrawerButton.addEventListener('click', function() {
                drawer.classList.add('-translate-x-full');
                drawer.classList.remove('translate-x-0');
            });

            // Ocultar el drawer si se hace clic fuera del drawer
            document.addEventListener('click', function(event) {
                if (!drawer.contains(event.target) && !showDrawerButton.contains(event.target)) {
                    drawer.classList.add('-translate-x-full');
                    drawer.classList.remove('translate-x-0');
                }
            });
        });

        //activa y desactiva el <!-- Dropdown del menu lateral -->
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggles = document.querySelectorAll('[data-toggle-menu]');

            menuToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const menuId = this.getAttribute('data-toggle-menu');
                    const menuElement = document.getElementById(menuId);

                    if (menuElement) {
                        menuElement.classList.toggle('hidden');
                    }
                });
            });
        });
    </script>
