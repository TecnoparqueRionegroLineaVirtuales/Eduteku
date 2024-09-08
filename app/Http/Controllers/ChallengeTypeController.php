<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use App\Models\ChallengeType;

class ChallengeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveyTypes = ChallengeType::withCount('questions')->get();
        return view('admin.openInnovation.survey.index', compact('surveyTypes'));
    }

    /**
     * Show the editable list of questions for the current ChallengeType (create question with modal)
     */

    public function details(ChallengeType $challengeType)
    {
        $questionTypes = QuestionType::all();
        $challengeType->load('questions.questionType');
        return view('admin.openInnovation.survey.survey', compact('challengeType', 'questionTypes'));
    }

    /**
     * Show the list of questions for the current ChallengType to answer
     */
    public function showQuestions(ChallengeType $challengeType)
    {
        $challengeType->load('questions');
        $challenge = Challenge::find(1);
        return view('users.openInnovation.answerSurvey', compact('challengeType', 'challenge'));
    }


}
