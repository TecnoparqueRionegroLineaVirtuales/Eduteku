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
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        $like = Like::where('user_id', Auth::id())
                    ->where('multimedia_id', $edtId)
                    ->first();
        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'multimedia_id' => $edtId,
            ]);
            $liked = true;
        }
        return response()->json(['liked' => $liked]);
    }
}
