<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\multimedia;
use App\Models\like;
use Illuminate\Support\Facades\Auth;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $multimedia = multimedia::where('category_id', '6')->get();
        $boletin = multimedia::where('category_id', '7')->get();

        // Obtener los likes del usuario actual para los multimedia
        $likes = like::where('user_id', $userId)->pluck('multimedia_id')->toArray();

        return view('users.bulletin', [
            'multimedia' => $multimedia,
            'boletin' => $boletin,
            'likes' => $likes, // Enviar los likes del usuario a la vista
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
