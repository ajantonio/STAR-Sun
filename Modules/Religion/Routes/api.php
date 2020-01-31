<?php

use Modules\Religion\Actions\GetAllReligionDetails;
use Modules\Religion\Actions\GetAllReligions;
use Modules\Religion\Actions\StoreNewReligion;
use Modules\Religion\Actions\DeleteReligion;
use Modules\Religion\Actions\UpdateReligion;
use Modules\Religion\Actions\FindReligion;

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
Route::middleware('auth:api')->prefix('religion')->group(function(){
    Route::post('/', StoreNewReligion::class)->name('api.religion.store');
    Route::get('/{religion}', FindReligion::class)->name('api.religion.find');
    Route::put('/{religion}', UpdateReligion::class)->name('api.religion.update');
    Route::delete('/{religion}', DeleteReligion::class)->name('api.religion.destroy');
    Route::get('/',GetAllReligions::class)->name('api.religion.index');
    Route::get('/{religion}/show', GetAllReligionDetails::class)->name('api.religion.show');
});