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

use Modules\Religion\Actions\ShowCreateReligionForm;
use Modules\Religion\Actions\ShowEditReligionForm;
use Modules\Religion\Actions\ViewReligion;
use Modules\Religion\Actions\DataTableOfReligion;

Route::prefix('religion')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfReligion::class)->name('religion.index');
    Route::get('/create', ShowCreateReligionForm::class)->name('religion.create');
    Route::get('/{religion}', ViewReligion::class)->name('religion.show');
    Route::get('/{religion}/edit', ShowEditReligionForm::class)->name('religion.edit');
});
