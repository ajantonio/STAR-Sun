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

use Modules\GradeLevel\Actions\ShowCreateGradeLevelForm;
use Modules\GradeLevel\Actions\ShowEditGradeLevelForm;
use Modules\GradeLevel\Actions\ViewGradeLevel;
use Modules\GradeLevel\Actions\DataTableOfGradeLevel;

Route::prefix('gradelevel')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfGradeLevel::class)->name('gradelevel.index');
    Route::get('/create', ShowCreateGradeLevelForm::class)->name('gradelevel.create');
    Route::get('/{gradelevel}', ViewGradeLevel::class)->name('gradelevel.show');
    Route::get('/{gradelevel}/edit', ShowEditGradeLevelForm::class)->name('gradelevel.edit');
});
