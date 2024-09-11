<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootcamp</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/s6qrwphproqqpe62ildiadgce0foysc6oj7rtn50ilp2fibo/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    @include('components.nav-header-dashboard')
<main>
    <div class="flex flex-col md:flex-row">
        @include('components.nav-dashboard')
        <section class="w-full">
            <div id="main" class="main-content mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="bg-gray-100 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-green-500 p-4 shadow text-2xl text-current">
                        <h1 class="font-bold pl-2">Usuarios inscritos a bootcamps</h1>
                    </div>
                </div>
                <div class="flex flex-wrap w-full py-20 px-12 lg:px-24 shadow-xl mb-24">
                        <!--tablet-->
                        <div class="flex flex-col w-full">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light text-surface">
                                  <thead class="border-b border-neutral-200 font-medium">
                                      <tr>
                                          <th scope="col" class="px-6 py-4">#</th>
                                          <th scope="col" class="px-6 py-4">Nombre</th>
                                          <th scope="col" class="px-6 py-4">Apellido</th>
                                          <th scope="col" class="px-6 py-4">Telefono</th>
                                          <th scope="col" class="px-6 py-4">Perfil</th>
                                          <th scope="col" class="px-6 py-4">Modo de participación</th>
                                          <th scope="col" class="px-6 py-4">Bootcamp</th>
                                          <th scope="col" class="px-6 py-4">Acción</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($bootcamps as $bootcamp)
                                        @foreach ($bootcamp->userInfo as $userInfo)
                                            <tr class="border-b border-neutral-200">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $userInfo->user->id }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $userInfo->user->name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $userInfo->user->last_name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $userInfo->phone }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $userInfo->profile }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $userInfo->mode }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $bootcamp->name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                <form action="{{ route('bootcamp_participation_admin.toggleChallengeState', $userInfo->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    @if ($userInfo->challenge_state_id == 1)
                                                        <button type="submit" class="bg-red-400 text-white p-2 rounded">
                                                            Deshabilitar Solucionador
                                                        </button>
                                                    @else
                                                        <button type="submit" class="bg-green-400 text-white p-2 rounded">
                                                            Habilitar Solucionador
                                                        </button>
                                                    @endif
                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>

                              </table>
                              <!-- Enlaces de paginación -->
                                <div class="mt-4">
                                    {{ $bootcamps->links() }}
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
</script>
</body>
</html>
