<?php

use Modules\Period\Actions\GetAllPeriod;
use Modules\Period\Actions\GetPeriodDetails;
use Modules\Period\Actions\StoreNewPeriod;
use Modules\Period\Actions\DeletePeriod;
use Modules\Period\Actions\UpdatePeriod;
use Modules\Period\Actions\FindPeriod;

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
Route::middleware('auth:api')->prefix('period')->group(function(){
    Route::post('/', StoreNewPeriod::class)->name('api.period.store');
    Route::get('/', GetAllPeriod::class)->name('api.period.index');
    Route::get('/{period}', FindPeriod::class)->name('api.period.find');
    Route::put('/{period}', UpdatePeriod::class)->name('api.period.update');
    Route::delete('/{period}', DeletePeriod::class)->name('api.period.destroy');
    Route::get('/{period}/show', GetPeriodDetails::class)->name('api.period.show');
});