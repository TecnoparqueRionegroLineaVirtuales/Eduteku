<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

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
        dd($request->all());

        //validate image file if present...
        $validatedInput = $request->validate([
            'challenge-id' => 'required|numeric',
            'question.*'
            'question-.*.-answer' => 'required|numeric',
            'answer-content' => 'required|string|max:500',
            'image' => ['sometimes', 'required', File::image()->max('15mb')],
        ]);

        $challenge->answers()->create($request->all());
        return response()->json(['status' => 'success']);
    }
}
