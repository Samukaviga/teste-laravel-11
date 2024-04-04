<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Http\Requests\FormSeriesRequest;
use App\Models\Series;
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

    public function store(FormSeriesRequest $request, Series $series)
    {   

        $series::create($request->all());

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
