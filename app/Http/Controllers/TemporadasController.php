<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(Request $request){

       $serie = Series::find($request->id);

       return view('temporadas.index')->with('serie', $serie);
    }
}
