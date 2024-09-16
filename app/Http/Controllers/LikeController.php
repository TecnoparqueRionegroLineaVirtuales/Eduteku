<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\bootcamps;
use App\Models\Challenge;
use App\Models\multimedia;
use Illuminate\Http\Request;
use App\Models\OpenInnovationLike;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(multimedia $multimedia)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $userId = Auth::id();
        $like = like::where('user_id', $userId)
                    ->where('multimedia_id', $multimedia->id)
                    ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            like::create([
                'user_id' => $userId,
                'multimedia_id' => $multimedia->id,
            ]);
            $liked = true;
        }

        return response()->json(['liked' => $liked]);
    }

    public function toggleBootcampLike($bootcampId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $userId = Auth::id();
        $bootcamp = bootcamps::findOrFail($bootcampId);

        // check if the model has a like from the user
        $like = OpenInnovationLike::where('user_id', $userId)
                    ->where('likeable_id', $bootcamp->id)
                    ->where('likeable_type', bootcamps::class)
                    ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            OpenInnovationLike::create([
                'user_id' => $userId,
                'likeable_id' => $bootcamp->id,
                'likeable_type' => bootcamps::class,
            ]);
            $liked = true;
        }

        return response()->json(['liked' => $liked]);
    }

    public function toggleChallengeLike($challengeId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $userId = Auth::id();
        $challenge = Challenge::findOrFail($challengeId);

        // check if the model has a like from the user
        $like = OpenInnovationLike::where('user_id', $userId)
                    ->where('likeable_id', $challenge->id)
                    ->where('likeable_type', Challenge::class)
                    ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            OpenInnovationLike::create([
                'user_id' => $userId,
                'likeable_id' => $challenge->id,
                'likeable_type' => Challenge::class,
            ]);
            $liked = true;
        }

        return response()->json(['liked' => $liked]);
    }
}
