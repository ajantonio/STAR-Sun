<?php

use Modules\Indigenous\Actions\StoreNewIndigenous;
use Modules\Indigenous\Actions\DeleteIndigenous;
use Modules\Indigenous\Actions\UpdateIndigenous;
use Modules\Indigenous\Actions\FindIndigenous;
use Modules\Indigenous\Actions\GetAllIndigenous;
use Modules\Indigenous\Actions\GetIndigenousDetails;

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
Route::middleware('auth:api')->prefix('indigenous')->group(function(){
    Route::post('/', StoreNewIndigenous::class)->name('api.indigenous.store');
    Route::get('/', GetAllIndigenous::class)->name('api.indigenous.index');
    Route::get('/{indigenous}', FindIndigenous::class)->name('api.indigenous.find');
    Route::put('/{indigenous}', UpdateIndigenous::class)->name('api.indigenous.update');
    Route::delete('/{indigenous}', DeleteIndigenous::class)->name('api.indigenous.destroy');
    Route::get('/{indigenous}/show', GetIndigenousDetails::class)->name('api.indigenous.show');
});