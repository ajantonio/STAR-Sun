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

use Modules\Application\Actions\DatatableOfApplication;
use Modules\Application\Actions\ShowCreateApplciationForm;
use Modules\Application\Actions\ShowEditApplicationForm;

Route::prefix('application')->group(function () {
    Route::get('/', DatatableOfApplication::class)->name('application.index');
    Route::get('/create', ShowCreateApplciationForm::class)->name('application.create');
    Route::get('/{application}/edit', ShowEditApplicationForm::class)->name('application.edit');
});
