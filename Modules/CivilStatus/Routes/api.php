<?php

use Modules\CivilStatus\Actions\GetAllCivilStatus;
use Modules\CivilStatus\Actions\GetCivilStatusDetails;
use Modules\CivilStatus\Actions\StoreNewCivilStatus;
use Modules\CivilStatus\Actions\DeleteCivilStatus;
use Modules\CivilStatus\Actions\UpdateCivilStatus;
use Modules\CivilStatus\Actions\FindCivilStatus;

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
Route::middleware('auth:api')->prefix('civilstatus')->group(function(){
    Route::post('/', StoreNewCivilStatus::class)->name('api.civilstatus.store');
    Route::get('/', GetAllCivilStatus::class)->name('api.civilstatus.index');
    Route::get('/{civilstatus}', FindCivilStatus::class)->name('api.civilstatus.find');
    Route::put('/{civilstatus}', UpdateCivilStatus::class)->name('api.civilstatus.update');
    Route::delete('/{civilstatus}', DeleteCivilStatus::class)->name('api.civilstatus.destroy');
    Route::get('/{civilstatus}/show', GetCivilStatusDetails::class)->name('api.civilstatus.show');
});