<?php

use Modules\Term\Actions\GetAllTerm;
use Modules\Term\Actions\GetTermDetails;
use Modules\Term\Actions\StoreNewTerm;
use Modules\Term\Actions\DeleteTerm;
use Modules\Term\Actions\TermEventDetails;
use Modules\Term\Actions\UpdateTerm;
use Modules\Term\Actions\FindTerm;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->prefix('term')->group(function () {
    Route::post('/', StoreNewTerm::class)->name('api.term.store');
    Route::get('/', GetAllTerm::class)->name('api.term.index');
    Route::get('/{term}', FindTerm::class)->name('api.term.find');
    Route::put('/{term}', UpdateTerm::class)->name('api.term.update');
    Route::delete('/{term}', DeleteTerm::class)->name('api.term.destroy');
    Route::get('/{term}/show', GetTermDetails::class)->name('api.term.show');

    Route::get('/{id}/event_details', TermEventDetails::class)->name('api.term.event.details');
    //Route::get('/{id}/period_events')->name('api.term.period.events');
});