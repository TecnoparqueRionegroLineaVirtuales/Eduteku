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
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $userId = Auth::id();

        // Verificar si el usuario ya dio like a este multimedia
        $like = Like::where('user_id', $userId)
                    ->where('multimedia_id', $multimedia->id)
                    ->first();

        // Si ya existe el like, lo eliminamos (toggle)
        if ($like) {
            $like->delete();
            $liked = false; // Indicar que el usuario ya no ha dado like
        } else {
            // Si no existe el like, lo creamos
            Like::create([
                'user_id' => $userId,
                'multimedia_id' => $multimedia->id,
            ]);
            $liked = true; // Indicar que el usuario ha dado like
        }

        return response()->json(['liked' => $liked]);
    }
}
