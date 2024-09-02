<nav class=" fixed top-0 left-0 right-0 z-50 bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4 ">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img class="h-20" src="{{ asset('storage/img/logosena.png') }}" alt="logo" />
        </a>
        <button type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
            aria-controls="drawer-navigation"
            class="flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- nav lateral -->
        <div id="drawer-navigation"
            class="mt-4 fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-gray-200 w-64 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-navigation-label">
            <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                Menu</h5>
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

                    <!-- Tecnoparque -->
                    <li id="dropdownTecnoparquButton" data-toggle-menu="dropdown-Tecnoparque" type="button" class="relative">
                        <button  type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-tecnoparque" data-collapse-toggle="dropdown-tecnoparque">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Tecnoparque</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d=" m1
                                  1 4 4 4-4" />
                        </svg>
                        </button>
                        <!-- Dropdown menu -->

                        <ul id="dropdown-Tecnoparque" class="hidden py-2 space-y-2">
                            <li><a href="{{ url('/') }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Inicio
                                </a>
                            </li>
                            <li><a href="{{ url('info') }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    ¿Qué hacemos en Tecnoparque?
                                </a>
                            </li>
                            <li><a href="{{ url('ruta') }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Ruta
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Información tecnológica -->
                    <li id="dropdownTecnoparquButton" data-toggle-menu="dropdown-Inf" type="button" class="relative">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-info" data-collapse-toggle="dropdown-info">
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                                Información tecnológica
                            </span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <ul id="dropdown-Inf" class="hidden py-2 space-y-2">
                            <li><a href="{{ url('edt') }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Eventos
                                    de divulgación Tecnológica (EDT)
                                </a>
                            </li>
                            <li><a href="{{ url('bulletin') }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Boletines
                                    tecnológicos
                                </a>
                            </li>
                            <li><a href="{{ url('successCases') }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Casos
                                    de éxito
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Innovación abierta -->
                    <li id="dropdownTecnoparquButton" data-toggle-menu="dropdown-innovacion" type="button" class="relative">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-innovacion" data-collapse-toggle="dropdown-innovacion">
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                                Innovación abierta
                            </span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <ul id="dropdown-innovacion" class="hidden py-2 space-y-2">
                            <li><a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Inscribir Reto
                                </a>
                            </li>
                            <li><a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Visualizar Retos
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Eventos -->
                    <li>
                        <a href="#"
                        class=" flex items-center w-full p-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Eventos
                        </a>
                    </li>
                </ul>

                <!-- Botón de Inicio de Sesión/Panel -->
                <div class="mt-5 flex items-center justify-center">
                    @auth
                        @if (auth()->user()->hasRole('user') || auth()->user()->hasRole('admin'))
                            <a href="{{ route('dashboard') }}">
                                <button
                                    class="inline-flex items-center bg-[#39A900] border-0 py-2 px-4 text-sm whitespace-nowrap focus:outline-none hover:bg-[#00314D] text-white rounded">
                                        Ir al panel
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1"
                                        viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}">
                            <button
                                class="inline-flex items-center bg-[#39A900] border-0 py-4 px-5 text-sm whitespace-nowrap focus:outline-none hover:bg-[#00314D] text-white rounded">
                                    Iniciar sesión
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </a>
                    @endauth
                </div>

            </div>
        </div>

        <!-- nav top-->
        <div class="hidden w-full md:flex md:items-center justify-center" id="navbar-default">
            <ul class="font-medium flex flex-wrap p-0 m-0 space-x-2">
            <!-- Tecnoparque -->
            <li class="relative">
                <button id="dropdownTecnoparqueButton" data-dropdown-toggle="dropdownTecnoparque"
                    class="text-gray-900 dark:text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent py-1 px-2 text-sm rounded-lg inline-flex items-center">
                    Tecnoparque
                    <svg class="w-2.5 h-2.5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownTecnoparque"
                    class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a href="{{ url('/') }}"
                                class="block py-2 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('info') }}"
                                class="block py-2 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                ¿Qué hacemos en Tecnoparque?
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('ruta') }}"
                                class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Ruta
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Información tecnológica -->
            <li class="relative">
                <button id="dropdownTecnoparqueButton" data-dropdown-toggle="dropdownInfo"
                    class="text-gray-900 dark:text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent py-1 px-2 text-sm rounded-lg inline-flex items-center">
                        Información tecnológica
                    <svg class="w-2.5 h-2.5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownInfo"
                    class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a href="{{ url('edt') }}"
                                class="block py-2 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Eventos de divulgación Tecnologica (EDT)
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('bulletin') }}"
                                class="block py-2 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Boletines tecnológicos
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('successCases') }}"
                                class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Casos de éxito
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Innovación abierta -->
            <li class="relative">
                <button id="dropdownInnovacionButton" data-dropdown-toggle="dropdownInnovacion"
                    class="text-gray-900 dark:text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent py-1 px-2 text-sm rounded-lg inline-flex items-center">
                        Innovación abierta
                    <svg class="w-2.5 h-2.5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownInnovacion"
                    class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li><a href="#"
                                class="block py-2 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Inscribir Reto</a>
                            </li>
                        <li><a href="#"
                                class="block py-2 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Visualizar Retos</a>
                            </li>
                    </ul>
                </div>
            </li>
            <!-- Eventos -->
            <li>
                <a href="#"
                    class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                    Eventos
                </a>
            </li>
            <!-- Botón de Inicio de Sesión/Panel -->
            <div class="flex items-center">
                @auth
                    @if (auth()->user()->hasRole('user') || auth()->user()->hasRole('admin'))
                        <a href="{{ route('dashboard') }}">
                            <button
                                class="inline-flex items-center bg-[#39A900] border-0 py-1 px-3 text-sm whitespace-nowrap focus:outline-none hover:bg-[#00314D] text-white rounded">
                                Ir al panel
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1"
                                    viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}">
                        <button
                            class="inline-flex items-center bg-[#39A900] border-0 py-1 px-3 text-sm whitespace-nowrap focus:outline-none hover:bg-[#00314D] text-white rounded">
                            Iniciar sesión
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </a>
                @endauth
            </div>
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

 //activa y desactiva el <!-- Dropdown menu lateral -->
    document.addEventListener('DOMContentLoaded', function () {
    const menuToggles = document.querySelectorAll('[data-toggle-menu]');

    menuToggles.forEach(toggle => {
        toggle.addEventListener('click', function () {
            const menuId = this.getAttribute('data-toggle-menu');
            const menuElement = document.getElementById(menuId);

            if (menuElement) {
                menuElement.classList.toggle('hidden');
            }
        });
    });
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

</script>
