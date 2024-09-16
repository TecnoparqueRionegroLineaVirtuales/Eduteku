<?php
// app/Http/Controllers/LikeUserController.php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\bootcamps;
use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\OpenInnovationLike;
use Illuminate\Support\Facades\Auth;

class LikeUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
      	$email = $user->email;
        $password = $user->password;
        $likes = like::where('user_id', $user->id)->with('multimedia')->get();
        // $openInnovationLikes = OpenInnovationLike::where('user_id', $user->id)->with('likeable')->get();
        $bootcampLikes = OpenInnovationLike::where('user_id', $user->id)->where('likeable_type', bootcamps::class)->with('likeable')->get();
        $challengeLikes = OpenInnovationLike::where('user_id', $user->id)->where('likeable_type', Challenge::class)->with('likeable')->get();

        return view('admin.like.like', compact('likes', 'bootcampLikes', 'challengeLikes', 'email', 'password'));
    }
}
