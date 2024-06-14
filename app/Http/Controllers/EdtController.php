<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class EdtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multimedia = Multimedia::where('category_id', '4')->get();
        $edt = Multimedia::where('category_id', '5')->get();
        $likes = Auth::check() ? Like::where('user_id', Auth::id())->pluck('multimedia_id')->toArray() : [];

        return view('users.edt', compact('multimedia', 'edt', 'likes'));
    }

    /**
     * Toggle like for an EDT.
     */
    public function toggleLike($edtId)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        // Verificar si ya existe un like para este EDT
        $like = Like::where('user_id', Auth::id())
                    ->where('multimedia_id', $edtId)
                    ->first();

        // Si existe, eliminar el like (toggle)
        if ($like) {
            $like->delete();
            $liked = false; // Indicar que el usuario ya no ha dado like
        } else {
            // Si no existe, crear el like
            Like::create([
                'user_id' => Auth::id(),
                'multimedia_id' => $edtId,
            ]);
            $liked = true; // Indicar que el usuario ha dado like
        }

        return response()->json(['liked' => $liked]);
    }
}
