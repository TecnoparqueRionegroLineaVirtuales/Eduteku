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
     * Store a text answer (questionType: text, video, urls)
     */
    public static function store($question, $challenge_id, $user_id)
    {
        $answer = new ChallengeAnswer();
        $answer->challenge_id = $challenge_id;
        $answer->user_id = $user_id;
        $answer->challenge_question_id = $question->id;
        $answer->content = $question->answer;
        $answer->save();
        return true;
    }

    /**
     *  Store an image answer (questionType: image)
     */
    public static function storeImageAnswer($question, $challenge_id, $user_id, $file)
    {
        $answer = new ChallengeAnswer();
        $answer->challenge_id = $challenge_id;
        $answer->user_id = $user_id;
        $answer->challenge_question_id = $question->id;

        // using default laravel store method (generates a unique id as filename)
        try {
            $folderPath = 'public/img/challenges/' . $challenge_id;
            $path = $file->store($folderPath);
            $answer->content = $path;
            $answer->save();
            return true;
        } catch (\Exception $e) {
            Log::error('Error storing file:' . $e->getMessage());
            return false;
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
