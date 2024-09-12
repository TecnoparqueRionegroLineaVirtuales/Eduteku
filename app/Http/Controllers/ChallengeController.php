<?php

namespace App\Http\Controllers;

use App\Models\bootcamps;
use App\Models\Challenge;
use App\Models\userInfo;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\ChallengeType;
use App\Enums\QuestionTypeEnum;
use Illuminate\Validation\Rules\File;

class ChallengeController extends Controller
{

    public function dashboard()
    {
        return view('admin.challenge.panelChallenge');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::all();
        $bootcamp = bootcamps::all();

        return view('admin.challenge.challenge', compact('challenges', 'bootcamp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:400',
                'url' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'bootcamp_id' => 'required',
                'tags' => 'nullable|array',
                'tags.*' => 'string',
                'links' => 'nullable|array',
                'links.*' => 'url'
            ]);



            $challenge = new Challenge();
            $challenge->challenge_type_id = 1;
            $challenge->bootcamp_id = $request->input('bootcamp_id');
            $challenge->name = $request->input('name');
            $challenge->description = $request->input('description');

            // Manejo del archivo
            if ($request->hasFile('url')) {
                $file = $request->file('url');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/img/challenge', $filename);
                $challenge->img_url = $filename;
            }

            $challenge->save();

            // Guardar la relación de las etiquetas
            if ($request->has('tags') && is_array($request->input('tags'))) {
                // Obtener el texto de tags (el primer elemento del array)
                $tagsText = $request->input('tags')[0];

                // Convertir el texto en un array de IDs
                $tagsArray = array_map('trim', explode(',', $tagsText));

                // Filtrar los tags para asegurarse de que sean numéricos y no vacíos
                $tags = array_filter($tagsArray, function ($value) {
                    return !empty($value) && is_numeric($value);
                });

                // Sincronizar los tags con el challenge
                $challenge->tags()->sync($tags);
            }

            // Guardar los enlaces
            if ($request->has('links')) {
                $links = $request->input('links');
                foreach ($links as $link) {
                    $challenge->links()->create(['url' => $link]);
                }
            }

            return redirect()->back()->with('success', 'Reto guardado exitosamente!');
        } catch (\Exception $e) {
            // Registrar el error
            Log::error('Error al guardar el reto: ' . $e->getMessage());

            // Mostrar mensaje de error al usuario
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        $bootcamps = bootcamps::all();
        $tags = Tags::all();
        $challengeTags = $challenge->tags->pluck('id')->toArray();
        $links = $challenge->links;

        return view('admin.challenge.edit', compact('bootcamps', 'challenge', 'tags', 'challengeTags', 'links'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validar los datos
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:400',
                'url' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'bootcamp_id' => 'required',
                'tags' => 'nullable|array',
                'tags.*' => 'string',
                'links' => 'nullable|array',
                'links.*' => 'url'
            ]);

            // Encontrar el challenge existente
            $challenge = Challenge::findOrFail($id);

            // Actualizar los campos del challenge
            $challenge->bootcamp_id = $request->input('bootcamp_id');
            $challenge->name = $request->input('name');
            $challenge->description = $request->input('description');

            // Manejo del archivo (solo actualizar si hay un nuevo archivo)
            if ($request->hasFile('url')) {
                $file = $request->file('url');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/img/challenge', $filename);
                $challenge->img_url = $filename;
            }

            $challenge->save();

            // Actualizar la relación de las etiquetas
            if ($request->has('tags') && is_array($request->input('tags'))) {
                if (count($request->input('tags')) > 1) {
                    $tagsText = $request->input('tags')[1];
                } else {
                    $tagsText = $request->input('tags')[0];
                };

                $tagsArray = array_map('trim', explode(',', $tagsText));

                $tags = array_filter($tagsArray, function ($value) {
                    return !empty($value) && is_numeric($value);
                });

                // Sincronizar los tags con el challenge
                $challenge->tags()->sync($tags);
            }

            // Actualizar los enlaces
            if ($request->has('links')) {
                // Eliminar los enlaces existentes
                $challenge->links()->delete();

                // Añadir los nuevos enlaces
                $links = $request->input('links');
                foreach ($links as $link) {
                    $challenge->links()->create(['url' => $link]);
                }
            }

            return redirect()->route('challenge.index')->with('success', 'Reto actualizado exitosamente!');
        } catch (\Exception $e) {
            // Registrar el error
            Log::error('Error al actualizar el reto: ' . $e->getMessage());

            // Mostrar mensaje de error al usuario
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        // Eliminar las relaciones en la tabla challenge_tags
        $challenge->tags()->detach(); // Si estás usando una relación de muchos a muchos

        // Eliminar el reto
        $challenge->delete();

        return redirect()->back()->with('success', 'Reto eliminado correctamente.');
    }



    /**
     * Store the survey answers for the challenge
     */
    public function storeAnswers(Request $request, Challenge $challenge)
    {
        // get the questions (and question type) for the bootcamp
        // get the logged in user
        $user = auth()->user();

        $bootcamp = bootcamps::find($challenge->bootcamp_id)->with('questions.questionType')->first();
        $questions = $bootcamp->questions;

        // TODO: required validation for images not working...
        // Same validation rules for text, url, or video questions
        $validatedInput = $request->validate([
            'questions.*' => 'required|string|max:500',
            'images.*' => ['required', File::image()->max('15mb')],
        ]);

        // TODO: rollback if any question cannot be saved?
        $files = $request->file('images');
        foreach ($questions as $question) {
            if (
                $question->questionType->name == QuestionTypeEnum::TEXT->value ||
                $question->questionType->name == QuestionTypeEnum::URL->value ||
                $question->questionType->name == QuestionTypeEnum::VIDEO->value
            ) {
                $question->answer = $validatedInput['questions'][$question->id];
                ChallengeAnswerController::store($question, $challenge->id, $user->id);
            }elseif($question->questionType->name == QuestionTypeEnum::IMAGE->value) {
                if($files && isset($files[$question->id])) {
                    $file = $files[$question->id];
                    ChallengeAnswerController::storeImageAnswer($question, $challenge->id, $user->id, $file);
                }
            }
        }

        return back()->with('success', 'Formulario completado correctamente.');
    }

    public function indexClient($id)
    {
        $challenge = Challenge::findOrFail($id);
        return view('users.viewChallenge', compact('challenge'));
    }

    public function solve($id)
    {
        $user = auth()->user();

        // Verifica si el reto existe
        $challenge = Challenge::find($id);

        if (!$challenge) {
            return response()->json(['status' => 'not_found'], 404);
        }

        // Obtiene la información del usuario
        $userInfo = userInfo::where('user_id', $user->id)->where('bootcamp_id', $challenge->bootcamp_id)->first();

        // Verifica si el usuario tiene acceso
        if (!$userInfo || $userInfo->challenge_state_id == 2) {
            return response()->json(['status' => 'disabled'], 403);
        }

        return redirect()->route('challenge.form', ['id' => $id]);
    }

    // Show the from to answer the bootcamp challenge survey
    public function showChallengeSurvey($challenge_id)
    {
        $challenge = Challenge::findOrFail($challenge_id);
        $challenge->bootcamp->load('questions');
        // $challenge->bootcamp->load('questions');
        return view('users.openInnovation.answerSurvey', compact('challenge'));
    }
}
