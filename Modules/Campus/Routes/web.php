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

use Modules\Campus\Actions\ShowCreateCampusForm;
use Modules\Campus\Actions\ShowEditCampusForm;
use Modules\Campus\Actions\ViewCampus;
use Modules\Campus\Actions\DataTableOfCampus;

Route::prefix('campus')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfCampus::class)->name('campus.index');
    Route::get('/create', ShowCreateCampusForm::class)->name('campus.create');
    Route::get('/{campus}', ViewCampus::class)->name('campus.show');
    Route::get('/{campus}/edit', ShowEditCampusForm::class)->name('campus.edit');
});
