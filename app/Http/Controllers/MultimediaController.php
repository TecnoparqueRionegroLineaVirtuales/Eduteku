<?php

namespace App\Http\Controllers;

use App\Models\multimedia;
use App\Models\status;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multimedia  = multimedia::all();
        $status  = status::all();
        $category  = category::all();
        return view('admin.multimedia.multimedia', compact('multimedia', 'status', 'category'));
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
            $datosValidados = $request->validate([
                'name' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'url' => 'required',
                'link' => 'required',
                'status_id' => 'required|exists:status,id',
                'category_id' => 'required|exists:category,id',
            ]);
            $link = $datosValidados['link'];
            $linkSave = Str::after($link, 'https://youtu.be/');
            
            $userId = Auth::id();

            if ($request->hasFile('url')) {
                
                $archivo = $request->file('url');
                $extension = $archivo->getClientOriginalExtension();
                $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

                try {
                    
                    $rutaArchivo = $archivo->storeAs('public/img', $nombreArchivo);

                    

                    
                    $multimedia = new Multimedia();
                    $multimedia->name = $datosValidados['name'];
                    $multimedia->descripcion = $datosValidados['descripcion'];
                    $multimedia->url = 'storage/img/' . $nombreArchivo;
                    $multimedia->link = $linkSave;
                    $multimedia->user_id = $userId;
                    $multimedia->status_id = $datosValidados['status_id'];
                    $multimedia->category_id = $datosValidados['category_id'];
                    $multimedia->save();

                    return redirect()->route('multimedia.index')->with('success', 'Archivo creado correctamente.');
                } catch (\Exception $e) {

                
                    return back()->withErrors(['error' => $e->getMessage()]);
                }
            }

            return back()->withErrors(['error' => 'Error al subir el archivo.']);
        }



    /**
     * Display the specified resource.
     */
    public function show(multimedia $multimedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(multimedia $multimedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, multimedia $multimedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(multimedia $multimedia)
    {
        //
    }
}