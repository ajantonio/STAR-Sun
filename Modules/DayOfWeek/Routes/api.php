<?php

use Modules\DayOfWeek\Actions\GetAllDayofWeek;
use Modules\DayOfWeek\Actions\GetDayofWeekDetails;
use Modules\DayOfWeek\Actions\StoreNewDayOfWeek;
use Modules\DayOfWeek\Actions\DeleteDayOfWeek;
use Modules\DayOfWeek\Actions\UpdateDayOfWeek;
use Modules\DayOfWeek\Actions\FindDayOfWeek;

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
Route::middleware('auth:api')->prefix('dayofweek')->group(function(){
    Route::post('/', StoreNewDayOfWeek::class)->name('api.dayofweek.store');
    Route::get('/', GetAllDayofWeek::class)->name('api.dayofweek.index');
    Route::get('/{dayofweek}', FindDayOfWeek::class)->name('api.dayofweek.find');
    Route::put('/{dayofweek}', UpdateDayOfWeek::class)->name('api.dayofweek.update');
    Route::delete('/{dayofweek}', DeleteDayOfWeek::class)->name('api.dayofweek.destroy');
    Route::get('/{dayofweek}/show', GetDayofWeekDetails::class)->name('api.dayofweek.show');
});