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

use Modules\School\Actions\ShowCreateSchoolForm;
use Modules\School\Actions\ShowEditSchoolForm;
use Modules\School\Actions\ViewSchool;
use Modules\School\Actions\DataTableOfSchool;


Route::prefix('school')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfSchool::class)->name('school.index');
    Route::get('/create', ShowCreateSchoolForm::class)->name('school.create');
    Route::get('/{school}/show', ViewSchool::class)->name('school.show');
    Route::get('/{school}/edit', ShowEditSchoolForm::class)->name('school.edit');
   
});
