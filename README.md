# Series

This is a project written in laravel, to participate in the alura course and practice a little. The course is called `Laravel: validando formulários, usando sessões e definindo relacionamentos`

Here is a couple things that was helpful to me:

`Route::resource('series', SeriesController::class);`

This `Resource` will create a couple of route to your project:

`Route::get('series/index', SeriesController::class)->name('series.index');`<br>
`Route::get('series/show', SeriesController::class)->name('series.show');`<br>
`Route::get('series/create', SeriesController::class)->name('series.create');`<br>
`Route::get('series/store', SeriesController::class)->name('series.store');`<br>
`Route::get('series/destroy', SeriesController::class)->name('series.destroy');`<br>

You can check it out better in the documentation.

## Session and Flash messages

You can create a session using Request and send to your blade file. For exemple:

```shell
    #region Destroy the series
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->put('message.deleted','The series has been deleted');
        return to_route('series.index');
    }
    #endregion
```

In the route that redirect to the index file, you can get that request.

```shell
    #region Searching for series
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $message = $request->session()->get('message.deleted'); #Receiving the session data
        return view('series.index')->with('series', $series)->with('message', $message); # Sending the session data
    }
    #endregion
```
