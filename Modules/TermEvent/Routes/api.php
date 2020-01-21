<?php

use Modules\TermEvent\Actions\GetAllTermEvent;
use Modules\TermEvent\Actions\GetTermEventDetails;
use Modules\TermEvent\Actions\StoreNewTermEvent;
use Modules\TermEvent\Actions\DeleteTermEvent;
use Modules\TermEvent\Actions\UpdateTermEvent;
use Modules\TermEvent\Actions\FindTermEvent;

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
Route::middleware('auth:api')->prefix('termevent')->group(function(){
    Route::post('/', StoreNewTermEvent::class)->name('api.termevent.store');
    Route::get('/', GetAllTermEvent::class)->name('api.termevent.index');
    Route::get('/{termevent}', FindTermEvent::class)->name('api.termevent.find');
    Route::put('/{termevent}', UpdateTermEvent::class)->name('api.termevent.update');
    Route::delete('/{termevent}', DeleteTermEvent::class)->name('api.termevent.destroy');
    Route::get('/{termevent}/show', GetTermEventDetails::class)->name('api.termevent.show');
});