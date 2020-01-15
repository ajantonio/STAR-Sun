<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\CityMunicipality\Actions\ShowCreateCityMunicipalityForm;
use Modules\CityMunicipality\Actions\ShowEditCityMunicipalityForm;
use Modules\CityMunicipality\Actions\ViewCityMunicipality;
use Modules\CityMunicipality\Actions\DataTableOfCityMunicipality;

Route::prefix('citymunicipality')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfCityMunicipality::class)->name('citymunicipality.index');
    Route::get('/create', ShowCreateCityMunicipalityForm::class)->name('citymunicipality.create');
    Route::get('/{citymunicipality}', ViewCityMunicipality::class)->name('citymunicipality.show');
    Route::get('/{citymunicipality}/edit', ShowEditCityMunicipalityForm::class)->name('citymunicipality.edit');
});
