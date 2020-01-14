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

use Modules\EducationLevel\Actions\ShowCreateEducationLevelForm;
use Modules\EducationLevel\Actions\ShowEditEducationLevelForm;
use Modules\EducationLevel\Actions\ViewEducationLevel;
use Modules\EducationLevel\Actions\DataTableOfEducationLevel;

Route::prefix('educationlevel')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfEducationLevel::class)->name('educationlevel.index');
    Route::get('/create', ShowCreateEducationLevelForm::class)->name('educationlevel.create');
    Route::get('/{educationlevel}', ViewEducationLevel::class)->name('educationlevel.show');
    Route::get('/{educationlevel}/edit', ShowEditEducationLevelForm::class)->name('educationlevel.edit');
});
