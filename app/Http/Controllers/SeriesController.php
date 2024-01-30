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
        $messageCreatedSeries = $request->session()->get('message.created');
        $messageUpdatedSeries = $request->session()->get('message.updated');

        return view('series.index')->with('series', $series)->with('message', $message)->with('messageCreatedSeries', $messageCreatedSeries)->with('messageUpdatedSeries',$messageUpdatedSeries);
    }
    #endregion

    #region Create series
    public function create()
    {
        return view('series.create');
    }
    #endregion

    #region Inserting the series into the database
    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();

        return redirect('/series')
            ->with('message.created', 'The series ' . $nomeSerie . ' has been registed with success');
    }
    #endregion

    #region Destroy the series
    public function destroy(Serie $series)
    {
        Serie::destroy($series->id);
        return to_route('series.index')
            ->with('message.deleted', 'The series ' . $series->nome . ' has been deleted');
    }
    #endregion

    #region Rendering series data
    public function update(Serie $series)
    {
        $select = Serie::find($series->id);
        return view('series.update')->with('dataSeries', $select);
    }
    #endregion

    #region Updateing Series
    public function edit(Serie $series, Request $request)
    {
       $name = $request->input('nome');
        try {
            DB::table('series')
                ->where('id', $series->id)
                ->update([
                    'nome' => $name,
                ]);

            return to_route('series.index')
                ->with('message.updated', 'The series ' . $series->nome . ' has been updated');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    #endregion
}
