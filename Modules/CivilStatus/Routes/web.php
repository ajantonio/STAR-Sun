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

use Modules\CivilStatus\Actions\ShowCreateCivilStatusForm;
use Modules\CivilStatus\Actions\ShowEditCivilStatusForm;
use Modules\CivilStatus\Actions\ViewCivilStatus;
use Modules\CivilStatus\Actions\DataTableOfCivilStatus;

Route::prefix('civilstatus')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfCivilStatus::class)->name('civilstatus.index');
    Route::get('/create', ShowCreateCivilStatusForm::class)->name('civilstatus.create');
    Route::get('/{civilstatus}', ViewCivilStatus::class)->name('civilstatus.show');
    Route::get('/{civilstatus}/edit', ShowEditCivilStatusForm::class)->name('civilstatus.edit');
});
