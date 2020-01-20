<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\TermEvent\Actions\ShowCreateTermEventForm;
use Modules\TermEvent\Actions\ShowEditTermEventForm;
use Modules\TermEvent\Actions\ViewTermEvent;
use Modules\TermEvent\Actions\DataTableOfTermEvent;

Route::prefix('termevent')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfTermEvent::class)->name('termevent.index');
    Route::get('/create', ShowCreateTermEventForm::class)->name('termevent.create');
    Route::get('/{termevent}', ViewTermEvent::class)->name('termevent.show');
    Route::get('/{termevent}/edit', ShowEditTermEventForm::class)->name('termevent.edit');
});
