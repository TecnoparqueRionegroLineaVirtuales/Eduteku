<?php

namespace App\Http\Controllers;

use App\Models\ChallengeAnswer;
use Illuminate\Http\Request;

class ChallengeAnswerController extends Controller
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
        //validate image file if present...
        $validatedInput = $request->validate([
            'challenge-id' => 'required|numeric',
            'challenge-question-id' => 'required|numeric',
            'answer-content' => 'required|string|max:500',
            'image' => ['sometimes', 'required', File::image()->max('15mb')],
        ]);

        if ($request->hasFile('image')) {
            $archivo = $request->file('image');
            $extension = $archivo->getClientOriginalExtension();
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            try {
                $rutaArchivo = $archivo->storeAs('public/img', $nombreArchivo);
                $multimedia->url = 'storage/img/' . $nombreArchivo;
                // TODO: continue here...

            } catch (\Exception $e) {

                return back()->withErrors(['error' => $e->getMessage()]);
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ChallengeAnswer $challengeAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChallengeAnswer $challengeAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChallengeAnswer $challengeAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChallengeAnswer $challengeAnswer)
    {
        //
    }
}
