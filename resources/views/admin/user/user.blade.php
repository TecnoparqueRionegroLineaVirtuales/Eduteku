<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    @include('components.nav-header-dashboard')
<main>
    <div class="flex flex-col md:flex-row">
        @include('components.nav-dashboard')
        <section class="w-full">
            <div id="main" class="main-content mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="bg-gray-100 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-green-600 p-4 shadow text-2xl text-current">
                        <h1 class="font-bold pl-2">Usuarios</h1>
                    </div>
                </div>
                <div class="flex flex-wrap w-full py-20 px-12 lg:px-24 shadow-xl mb-24">
                        <div class="flex flex-col w-full">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                  <table
                                    class="min-w-full text-left text-sm font-light text-surface">
                                    <thead
                                      class="border-b border-neutral-200 font-medium">
                                      <tr>
                                        <th scope="col" class="px-6 py-4">#</th>
                                        <th scope="col" class="px-6 py-4">Nombre</th>
                                        <th scope="col" class="px-6 py-4">Correo</th>
                                        <th scope="col" class="px-6 py-4">Correo</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($user as $users)
                                        <tr class="border-b border-neutral-200">
                                          <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $users->id }}</td>
                                          <td class="whitespace-nowrap px-6 py-4">{{ $users->name }}</td>
                                          <td class="whitespace-nowrap px-6 py-4">{{ $users->last_name }}</td>
                                          <td class="whitespace-nowrap px-6 py-4">{{ $users->email }}</td>
                                          
                                        </tr> 
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                </div>
            </div>
        </section>
    </div>
</main>
</body>
</html>