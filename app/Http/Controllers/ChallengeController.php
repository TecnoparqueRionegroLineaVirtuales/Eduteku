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
        //
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

        // Same validation rules for text, url, or video questions
        $validatedInput = $request->validate([
            'questions.*' => 'required|string|max:5',
            'files.*' => ['required', File::image()->max('15mb')],
        ]);

        //TODO: save questions, save image and url for img questions

        return response()->json(['status' => 'success']);
    }
}
