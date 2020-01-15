<?php

use Modules\CityMunicipality\Actions\GetAllCityMunicipalities;
use Modules\CityMunicipality\Actions\GetCityMunicipalityDetails;
use Modules\CityMunicipality\Actions\StoreNewCityMunicipality;
use Modules\CityMunicipality\Actions\DeleteCityMunicipality;
use Modules\CityMunicipality\Actions\UpdateCityMunicipality;
use Modules\CityMunicipality\Actions\FindCityMunicipality;

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
Route::middleware('auth:api')->prefix('citymunicipality')->group(function(){
    Route::post('/', StoreNewCityMunicipality::class)->name('api.citymunicipality.store');
    Route::get('/', GetAllCityMunicipalities::class)->name('api.citymunicipality.index');
    Route::get('/{country}/show', GetCityMunicipalityDetails::class)->name('api.country.show');
    Route::get('/{citymunicipality}', FindCityMunicipality::class)->name('api.citymunicipality.find');
    Route::put('/{citymunicipality}', UpdateCityMunicipality::class)->name('api.citymunicipality.update');
    Route::delete('/{citymunicipality}', DeleteCityMunicipality::class)->name('api.citymunicipality.destroy');
});