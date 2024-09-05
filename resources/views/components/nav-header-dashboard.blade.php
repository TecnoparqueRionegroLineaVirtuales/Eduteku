<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-100 z-10 pt-2 pb-1 px-1 mt-0 h-auto fixed w-full top-0">

        <div class="flex flex-wrap z-10 items-center justify-between">
            <!-- Logo -->
            <div class=" flex-1 justify-center md:justify-start text-current">
                <a href="{{ route('dashboard') }}" aria-label="Home">
                    <img class="h-14" src="{{ asset('storage/img/logosena.png') }}" alt="logo" />
                </a>
            </div>

            <!-- Menu Items -->
            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class=" top-18 right-0 md:flex-1 flex-none md:mr-3">
                        <div class="flex flex-1 justify-center md:justify-end w-full md:w-auto pt-2 md:pt-0">
                            <ul class="flex flex-wrap justify-center md:justify-end items-center w-full">
                                <li class="px-2 hidden md:block">
                                    <a href="{{ route('index.index') }}">
                                        <button
                                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none inline-block py-2 px-4 text-current no-underline hover:text-green-500 text-left md:text-center">
                                            <i class="fas fa-globe fa-fw"></i>Regresar al portal web
                                        </button>
                                    </a>
                                </li>
                                <li class="px-2 hidden md:block">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button
                                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none inline-block py-2 px-4 text-current no-underline hover:text-red-500"
                                            type="submit">
                                            <i class="fas fa-sign-out-alt fa-fw"></i>Cerrar sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                            <div>
                                <li class="px-2 justify-end">
                                    <button type="button" data-drawer-target="drawer-navigation"
                                        data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"
                                        class="flex justify-end ml-auto items-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                        aria-controls="navbar-default" aria-expanded="false">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 17 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                        </svg>
                                    </button>
                                </li>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
