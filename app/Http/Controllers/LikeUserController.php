<?php
// app/Http/Controllers/LikeUserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $likes = Like::where('user_id', $user->id)->with('multimedia')->get();

        return view('admin.like.like', compact('likes'));
    }
}
