<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Multimedia $multimedia)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $userId = Auth::id();
        $like = Like::where('user_id', $userId)
                    ->where('multimedia_id', $multimedia->id)
                    ->first();
        
        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => $userId,
                'multimedia_id' => $multimedia->id,
            ]);
            $liked = true;
        }

        return response()->json(['liked' => $liked]);
    }
}
