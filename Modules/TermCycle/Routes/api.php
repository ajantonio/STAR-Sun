<?php

use Modules\TermCycle\Actions\GetAllTermCycle;
use Modules\TermCycle\Actions\GetTermCycleDetails;
use Modules\TermCycle\Actions\StoreNewTermCycle;
use Modules\TermCycle\Actions\DeleteTermCycle;
use Modules\TermCycle\Actions\UpdateTermCycle;
use Modules\TermCycle\Actions\FindTermCycle;

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
Route::middleware('auth:api')->prefix('termcycle')->group(function(){
    Route::post('/', StoreNewTermCycle::class)->name('api.termcycle.store');
    Route::get('/', GetAllTermCycle::class)->name('api.termcycle.index');
    Route::get('/{termcycle}', FindTermCycle::class)->name('api.termcycle.find');
    Route::put('/{termcycle}', UpdateTermCycle::class)->name('api.termcycle.update');
    Route::delete('/{termcycle}', DeleteTermCycle::class)->name('api.termcycle.destroy');
    Route::get('/{termcycle}/show', GetTermCycleDetails::class)->name('api.termcycle.show');
});