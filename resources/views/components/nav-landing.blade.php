<header class="z-40 sticky top-0 bg-slate-50 shadow">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <img class="h-20" src="{{ asset('storage/img/logosena.png') }}" alt="logo" />
      
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      <a class="mr-10 hover:text-gray-900" href="{{ url('/') }}">Inicio</a>
      <a class="mr-10 hover:text-gray-900" href="{{ url('info') }}">¿Que hacemos en tecnoparque?</a>
      <a class="mr-10 hover:text-gray-900" href="{{ url('edt') }}">Eventos de divulgacion tecnologica (EDT)</a>
      <a class="mr-10 hover:text-gray-900" href="{{ url('bulletin') }}">Boletines tecnologicos</a>
      <a class="mr-10 hover:text-gray-900" href="{{ url('ruta') }}">Ruta</a>
      <a class="mr-10 hover:text-gray-900" href="{{ url('teku') }}">App Teku</a>
    </nav>
    @auth
      @if(auth()->user()->hasRole('user'))
        <a href="{{ route('login')}}">
          <button class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-600 text-white rounded text-base mt-4 md:mt-0">Ir al panel
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </a>
      @endif
      @if(auth()->user()->hasRole('admin'))
      <a href="{{ route('login')}}">
          <button class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-600 text-white rounded text-base mt-4 md:mt-0">Ir al panel
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </a>
    @endauth
    @else
      <a href="{{ route('login')}}">
        <button class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-600 text-white rounded text-base mt-4 md:mt-0">Iniciar sesión
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button>
      </a>
    @endif
    
  </div>
</header>