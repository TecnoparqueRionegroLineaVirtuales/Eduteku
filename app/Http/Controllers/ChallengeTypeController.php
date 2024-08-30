<?php

namespace App\Http\Controllers;

use App\Models\ChallengeType;
use Illuminate\Http\Request;

class ChallengeTypeController extends Controller
{
    //

    /**
     * Show the questions for the current ChallengeType
     */

    public function details(ChallengeType $challengeType)
    {
        $surveyTypes = ChallengeType::all();
        // $questions = $challengeType->questions();
        $questions = [['content' => 'pregunta 1'], ['content' => 'pregunta 2']];
        return view('admin.openInnovation.survey.survey', compact('surveyTypes','questions'));
        //
    }


}
