<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;

class MoviesController extends Controller
{
    //                Funciones para mostrar y seleccionar pelicula 
    public function index()
    {
        $movies = Movies::all();
        return view('index', compact('movies'));
    }

    public function find($titulo)
    {
        $decode = urldecode($titulo);
        $movies = Movies::where('titulo', $decode)->firstOrFail();
        return view('shopping', compact('movies'));
    }

    //                            Funciones para el CRUD

    public function res()
    {
        $movies = Movies::all();
        return view('admin/catalogue', compact('movies'));
    }

    public function registerOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'info' => 'required',
            'duracion' => 'required',
            'precio' => 'required',
            'banner' => 'required|file',
            'taquilla' => 'required'
        ]);

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerData = file_get_contents($banner);
            $validatedData['banner'] = $bannerData;
        }

        $titulo = $validatedData['titulo'];
        $existingMovie = Movies::where('titulo', $titulo)->first();

        if ($existingMovie) {
           
            $existingMovie->update($validatedData);

        } else {
           
            Movies::create($validatedData);
        }

        return redirect()->route('movies.register');
    }
    
    public function delete($titulo)
    {
        $decode = urldecode($titulo);
        $movie = Movies::where('titulo', $decode)->firstOrFail();
        $movie->delete();
        return redirect()->route('movies.register');
    }
}
