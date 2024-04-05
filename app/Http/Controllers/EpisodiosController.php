<?php

namespace App\Http\Controllers;

use App\Models\Episodios;
use App\Models\Temporadas;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Request $request) { 
       
        $temporada = Temporadas::find($request->id);
       
        return view('episodios.index')->with('temporada', $temporada);
    }

    public function update(Request $request){

        $temporada = Temporadas::find($request->id);

        $episodiosAssistidos = $request->episodios;

        $temporada->episodios->each(function (Episodios $episodio) use ($episodiosAssistidos) {

            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
            $episodio->save();
        
        });

        return redirect('/episodios/'. $temporada->id);
    }
}
