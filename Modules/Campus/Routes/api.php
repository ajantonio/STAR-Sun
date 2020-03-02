<?php

use Modules\Campus\Actions\GetCampusTerms;
use Modules\Campus\Actions\StoreNewCampus;
use Modules\Campus\Actions\DeleteCampus;
use Modules\Campus\Actions\UpdateCampus;
use Modules\Campus\Actions\FindCampus;
use Modules\Campus\Actions\GetAllCampuses;
use Modules\Campus\Actions\GetCampusDetails;

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
Route::middleware('auth:api')->prefix('campus')->group(function(){
    Route::post('/', StoreNewCampus::class)->name('api.campus.store');
    Route::get('/', GetAllCampuses::class)->name('api.campus.index');
    Route::get('/{campus}', FindCampus::class)->name('api.campus.find');
    Route::put('/{campus}', UpdateCampus::class)->name('api.campus.update');
    Route::delete('/{campus}', DeleteCampus::class)->name('api.campus.destroy');
    Route::get('/{campus}/show', GetCampusDetails::class)->name('api.campus.show');

    Route::get('/{campus_id}/terms', GetCampusTerms::class)->name('api.campus.terms');
});