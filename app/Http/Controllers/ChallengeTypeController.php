<?php

namespace App\Http\Controllers;

use App\Models\ChallengeType;
use Illuminate\Http\Request;

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
     * Show the questions for the current ChallengeType
     */

    public function details(ChallengeType $challengeType)
    {

        $challengeType->load('questions.questionType');
        return view('admin.openInnovation.survey.survey', compact('challengeType'));
    }


}
