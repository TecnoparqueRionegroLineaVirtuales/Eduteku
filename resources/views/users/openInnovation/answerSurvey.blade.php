<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preguntas de turismo:</title>
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @vite('resources/css/app.css')
</head>
<body>
  @include('components.nav-landing')

{{-- TODO: check if the user has already answered the challenge (and show a message) --}}
  <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 flex-col items-center mt-10">
        @if ($alreadyAnswered)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">Ya has respondido el cuestionario para este reto.</span>
            </div>
        @else
            <h2>Por favor responda el siguiente formulario:</h2>
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Error!</strong>
                @foreach ($errors->all() as $error)
                    <span class="block sm:inline">{{ $error }}</span>
                @endforeach
                </div>
            @endif
            <form action="{{ route('challenge.answers', $challenge->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach($challenge->bootcamp->questions as $question)
                <div class="w-full my-4">
                    {{-- TODO: check if using enums instead of strings is better (would also be called from the migration/seeder?) --}}
                    @if(
                        $question->questionType->name == App\Enums\QuestionTypeEnum::TEXT->value ||
                        $question->questionType->name == App\Enums\QuestionTypeEnum::URL->value ||
                        $question->questionType->name == App\Enums\QuestionTypeEnum::VIDEO->value
                        )
                        <label for="questions[{{ $question->id }}]" class="text-gray-700 dark:text-gray-400">{{ $question->content }}</label>
                        <textarea id="questions[{{ $question->id }}]" name="questions[{{ $question->id }}]" rows="3" class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-300"></textarea>
                    @elseif ($question->questionType->name == App\Enums\QuestionTypeEnum::IMAGE->value)
                        <label for="images[{{ $question->id }}]" class="text-gray-700 dark:text-gray-400">{{ $question->content }}</label>
                        <input type="file" id="images[{{ $question->id }}]" name="images[{{ $question->id }}]"
                        class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-300">
                    @endif
                </div>
                @endforeach
                <button class="inline-flex items-center bg-[#39A900] border-0 py-1 px-2 text-sm focus:outline-none hover:bg-[#00314D] text-white rounded">Enviar</button>
            </form>
        @endif
    </div>
  </section>
</body>
