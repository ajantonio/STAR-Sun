<?php

use Modules\TermPeriodEvent\Actions\GetAllTermPeriodEvent;
use Modules\TermPeriodEvent\Actions\GetTermPeriodEventDetail;
use Modules\TermPeriodEvent\Actions\StoreNewTermPeriodEvent;
use Modules\TermPeriodEvent\Actions\DeleteTermPeriodEvent;
use Modules\TermPeriodEvent\Actions\UpdateTermPeriodEvent;
use Modules\TermPeriodEvent\Actions\FindTermPeriodEvent;

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
Route::middleware('auth:api')->prefix('termperiodevent')->group(function(){
    Route::post('/', StoreNewTermPeriodEvent::class)->name('api.termperiodevent.store');
    Route::get('/', GetAllTermPeriodEvent::class)->name('api.termperiodevent.index');
    Route::get('/{termperiodevent}', FindTermPeriodEvent::class)->name('api.termperiodevent.find');
    Route::put('/{termperiodevent}', UpdateTermPeriodEvent::class)->name('api.termperiodevent.update');
    Route::delete('/{termperiodevent}', DeleteTermPeriodEvent::class)->name('api.termperiodevent.destroy');
    Route::get('/{termperiodevent}/show', GetTermPeriodEventDetail::class)->name('api.termperiodevent.show');
});