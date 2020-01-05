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

use Modules\Country\Actions\ShowCreateCountryForm;
use Modules\Country\Actions\ShowEditCountryForm;
use Modules\Country\Actions\ViewCountry;
use Modules\Country\Actions\DataTableOfCountry;

Route::prefix('country')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfCountry::class)->name('country.index');
    Route::get('/create', ShowCreateCountryForm::class)->name('country.create');
    Route::get('/{country}', ViewCountry::class)->name('country.show');
    Route::get('/{country}/edit', ShowEditCountryForm::class)->name('country.edit');
});
