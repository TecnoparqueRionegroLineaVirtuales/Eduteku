<?php

namespace App\Http\Controllers;

use App\Models\ChallengeQuestion;
use Illuminate\Http\Request;

class ChallengeQuestionController extends Controller
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
        $validatedInput = $request->validate([
            'challenge-type' => 'required|numeric',
            'question-type' => 'required|numeric',
            'question-content' => 'required|string|max:255',
        ]);
        $question = new ChallengeQuestion();
        $question->challenge_type_id = $validatedInput['challenge-type'];
        $question->question_type_id = $validatedInput['question-type'];
        $question->content = $validatedInput['question-content'];
        $question->save();

        return redirect()->back()->with('success', 'Pregunta creada correctamente.');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChallengeQuestion $challengeQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChallengeQuestion $challengeQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChallengeQuestion $challengeQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChallengeQuestion $challengeQuestion)
    {
        //
    }
}
