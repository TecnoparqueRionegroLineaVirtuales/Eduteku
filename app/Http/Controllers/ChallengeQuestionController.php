<?php

namespace App\Http\Controllers;

use App\Models\bootcamps;
use Illuminate\Http\Request;
use App\Models\ChallengeQuestion;

class ChallengeQuestionController extends Controller
{

    /**
     * Display a listing of the bootcamps to create a new survey.
     */
    public function showBootcampList()
    {
        $bootcamps = bootcamps::withCount('questions')->get();
        return view('admin.bootcamp.challengeSurvey.index', compact('bootcamps'));
    }


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
            'bootcamp-id' => 'required|numeric',
            'question-type' => 'required|numeric',
            'question-content' => 'required|string|max:500',
        ]);
        $question = new ChallengeQuestion();
        $question->bootcamp_id = $validatedInput['bootcamp-id'];
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

        $challengeQuestion->delete();

        return redirect()->back()->with('success', 'Pregunta eliminada correctamente.');
        //
    }
}
