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

use Modules\Period\Actions\ShowCreatePeriodForm;
use Modules\Period\Actions\ShowEditPeriodForm;
use Modules\Period\Actions\ViewPeriod;
use Modules\Period\Actions\DataTableOfPeriod;

Route::prefix('period')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfPeriod::class)->name('period.index');
    Route::get('/create', ShowCreatePeriodForm::class)->name('period.create');
    Route::get('/{period}', ViewPeriod::class)->name('period.show');
    Route::get('/{period}/edit', ShowEditPeriodForm::class)->name('period.edit');
});
