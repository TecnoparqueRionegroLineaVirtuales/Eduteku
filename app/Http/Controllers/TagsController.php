<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function getTags()
    {
        $tags = Tags::all();
        return response()->json($tags);
    }
}
