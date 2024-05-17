<nav aria-label="alternative nav">
    <div class="bg-gray-100 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen w-full md:w-48 content-center">

        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                @role('admin')
                <li class="mr-3 flex-1">
                    <a href="{{ route('category.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-layer-group pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Categorias</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('state.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fas fa-toggle-on pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Estados</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('multimedia.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fas fa-chart-area pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Multimedia</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route ('users') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fas fa-users pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Usuarios</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route ('messages.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Mensajes</span>
                    </a>
                </li>
                @endrole
                @role('user')
                <li class="mr-3 flex-1">
                    <a href="{{ route ('messages.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-thumbs-up pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Me gusta</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route ('messages.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-chalkboard-teacher pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Realizar cursos</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>


    </div>
</nav>