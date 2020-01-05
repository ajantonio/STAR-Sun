<?php

use Modules\ParentalMaritalStatus\Actions\StoreNewParentalMaritalStatus;
use Modules\ParentalMaritalStatus\Actions\DeleteParentalMaritalStatus;
use Modules\ParentalMaritalStatus\Actions\UpdateParentalMaritalStatus;
use Modules\ParentalMaritalStatus\Actions\FindParentalMaritalStatus;
use Modules\ParentalMaritalStatus\Actions\GetAllParentalMaritalStatuses;
use Modules\ParentalMaritalStatus\Actions\GetParentalMaritalStatusDetails;

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
Route::middleware('auth:api')->prefix('parentalmaritalstatus')->group(function(){
    Route::post('/', StoreNewParentalMaritalStatus::class)->name('api.parentalmaritalstatus.store');
    Route::get('/', GetAllParentalMaritalStatuses::class)->name('api.parentalmaritalstatus.index');
    Route::get('/{parentalmaritalstatus}', FindParentalMaritalStatus::class)->name('api.parentalmaritalstatus.find');
    Route::put('/{parentalmaritalstatus}', UpdateParentalMaritalStatus::class)->name('api.parentalmaritalstatus.update');
    Route::delete('/{parentalmaritalstatus}', DeleteParentalMaritalStatus::class)->name('api.parentalmaritalstatus.destroy');
    Route::get('/{parentalmaritalstatus}/show', GetParentalMaritalStatusDetails::class)->name('api.parentalmaritalstatus.show');
});