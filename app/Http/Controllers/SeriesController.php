<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    #region Searching for series 
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $message = $request->session()->get('message.deleted');
        return view('series.index')->with('series', $series)->with('message', $message);
    }
    #endregion

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();

        return redirect('/series');
    }

    #region Destroy the series
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->put('message.deleted','The series has been deleted');
        return to_route('series.index');
    }
    #endregion
}
