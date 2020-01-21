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

use Modules\SchoolLevel\Actions\ShowCreateSchoolLevelForm;
use Modules\SchoolLevel\Actions\ShowEditSchoolLevelForm;
use Modules\SchoolLevel\Actions\ViewSchoolLevel;
use Modules\SchoolLevel\Actions\DataTableOfSchoolLevel;

Route::prefix('schoollevel')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfSchoolLevel::class)->name('schoollevel.index');
    Route::get('/create', ShowCreateSchoolLevelForm::class)->name('schoollevel.create');
    Route::get('/{schoollevel}', ViewSchoolLevel::class)->name('schoollevel.show');
    Route::get('/{schoollevel}/edit', ShowEditSchoolLevelForm::class)->name('schoollevel.edit');
});
