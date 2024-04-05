<?php

namespace App\Http\Controllers;

use App\Models\Temporadas;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Request $request) { 
       
        $temporada = Temporadas::find($request->id);
       
        return view('episodios.index')->with('temporada', $temporada);
    }
}
