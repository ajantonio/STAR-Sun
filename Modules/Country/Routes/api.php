<?php

use Modules\Country\Actions\StoreNewCountry;
use Modules\Country\Actions\DeleteCountry;
use Modules\Country\Actions\UpdateCountry;
use Modules\Country\Actions\FindCountry;
use Modules\Country\Actions\GetAllCountries;
use Modules\Country\Actions\GetCountryDetails;

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
Route::middleware('auth:api')->prefix('country')->group(function(){
    Route::post('/', StoreNewCountry::class)->name('api.country.store');
    Route::get('/', GetAllCountries::class)->name('api.country.index');    
    Route::get('/{country}', FindCountry::class)->name('api.country.find');
    Route::put('/{country}', UpdateCountry::class)->name('api.country.update');
    Route::delete('/{country}', DeleteCountry::class)->name('api.country.destroy');    
    Route::get('/{country}/show', GetCountryDetails::class)->name('api.country.show');
});