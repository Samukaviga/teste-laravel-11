<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Http\Requests\FormSeriesRequest;
use App\Models\Episodios;
use App\Models\Series;
use App\Models\Temporadas;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  
    public function index()
    {   
        
       $mensagemSucesso = session('mensagem.sucesso');
        session()->forget('mensagem.sucesso');

        $series = Series::query()->orderBy('nome')->get();

        return view('series.index')->with('series', $series)
                                        ->with('mensagemSucesso', $mensagemSucesso);
    }
    
    public function create(Series $series)
    {
        return view('series.create');
    }

    public function store(FormSeriesRequest $request)
    {   

        $serie = Series::create($request->all());

        $temporadas = [];

        for($i = 1; $i <= $request->qtdTemporada; $i++){

            $temporadas[] = [
                'series_id' => $serie->id,
                'numero' => $i,
            ];    
        }

        Temporadas::insert($temporadas);

        $episodios = [];

        foreach($serie->temporadas as $temporada) {

            for($j = 1; $j <= $request->qtdEpisodios; $j++){

                $episodios[] = [
                    'temporadas_id' => $temporada->id,
                    'numero' => $j,
                ];

            }
        }

        Episodios::insert($episodios);

        return redirect('/series')->with('mensagem.sucesso', "Serie '$request->nome' adicionada com sucesso");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Request $request)
    {   
        $serie = Series::find($request->id);

        return view ('series.edit')->with('serie', $serie); 
    }

    public function update(FormSeriesRequest $request, string $id)
    {
        $serie = Series::find($request->id);
        $serie->nome = $request->nome;
        $serie->save();

        return redirect('/series')->with('mensagem.sucesso', "Serie '$serie->nome' Atualizada com sucesso!");
    }

    public function destroy(Request $request)
    {   
        $serie = Series::find($request->id);

        Series::destroy($request->id);

        return redirect('/series')->with('mensagem.sucesso', "Série '$serie->nome' removida com  sucesso");
    }
}
