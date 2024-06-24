<?php

namespace App\Http\Controllers;

use App\Models\multimedia;
use App\Models\status;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdtAdminController extends Controller
{
    public function index()
    {
        $multimedia = Multimedia::with('category')->where('category_id', 5)->paginate(3);

        $status = Status::all();

        $category = Category::where('id', 5)->first();

        return view('admin.Edt.edtAdmin', compact('multimedia', 'status', 'category'));
    }
}
