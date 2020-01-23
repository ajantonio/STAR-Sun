<?php

use Modules\TermEventDetail\Actions\GetAllTermEventDetail;
use Modules\TermEventDetail\Actions\GetTermEventDetailDetail;
use Modules\TermEventDetail\Actions\StoreNewTermEventDetail;
use Modules\TermEventDetail\Actions\DeleteTermEventDetail;
use Modules\TermEventDetail\Actions\UpdateTermEventDetail;
use Modules\TermEventDetail\Actions\FindTermEventDetail;

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
Route::middleware('auth:api')->prefix('termeventdetail')->group(function(){
    Route::post('/', StoreNewTermEventDetail::class)->name('api.termeventdetail.store');
    Route::get('/', GetAllTermEventDetail::class)->name('api.termeventdetail.index');
    Route::get('/{termeventdetail}', FindTermEventDetail::class)->name('api.termeventdetail.find');
    Route::put('/{termeventdetail}', UpdateTermEventDetail::class)->name('api.termeventdetail.update');
    Route::delete('/{termeventdetail}', DeleteTermEventDetail::class)->name('api.termeventdetail.destroy');
    Route::get('/{term}/show', GetTermEventDetailDetail::class)->name('api.termeventdetail.show');
});