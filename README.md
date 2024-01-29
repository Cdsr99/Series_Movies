## Series

This is a project written in laravel, to participate in the alura course and practice a little. The course is called ``Laravel: validando formulários, usando sessões e definindo relacionamentos``

Here is a couple things that was helpful to me:

``Route::resource('series', SeriesController::class);``

This ``Resource`` will create a couple of route to your project:

``Route::get('series/index', SeriesController::class)->name('series.index');``
``Route::get('series/show', SeriesController::class)->name('series.show');``
``Route::get('series/create', SeriesController::class)->name('series.create');``
``Route::get('series/store', SeriesController::class)->name('series.store');``
``Route::get('series/destroy', SeriesController::class)->name('series.destroy');``



