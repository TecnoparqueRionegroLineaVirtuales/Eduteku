<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\ChallengeType;
use App\Enums\QuestionTypeEnum;
use Illuminate\Validation\Rules\File;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::all();

        return view('admin.challenge.challenge', compact('challenges'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        //
    }


    /**
     * Store the answers for the challenge
     */
    public function storeAnswers(Request $request, Challenge $challenge)
    {
        // get the questions (and question type) for the challenge type...
        $challengeType = ChallengeType::find($challenge->challenge_type_id)->with('questions.questionType')->first();
        $questions = $challengeType->questions;

        // TODO: required validation for images not working...
        // Same validation rules for text, url, or video questions
        $validatedInput = $request->validate([
            'questions.*' => 'required|string|max:500',
            'images.*' => ['required', File::image()->max('15mb')],
        ]);

        // TODO: rollback if any question cannot be saved?
        $files = $request->file('images');
        foreach($questions as $question) {
            if($question->questionType->name == QuestionTypeEnum::TEXT->value ||
                $question->questionType->name == QuestionTypeEnum::URL->value ||
                $question->questionType->name == QuestionTypeEnum::VIDEO->value) {
                $question->answer = $validatedInput['questions'][$question->id];
                ChallengeAnswerController::store($question, $challenge->id);
            }elseif($question->questionType->name == QuestionTypeEnum::IMAGE->value) {
                if($files && isset($files[$question->id])) {
                    $file = $files[$question->id];
                    ChallengeAnswerController::storeImageAnswer($question, $challenge->id, $file);
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

}
