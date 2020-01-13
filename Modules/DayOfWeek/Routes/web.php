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

use Modules\DayOfWeek\Actions\ShowCreateDayOfWeekForm;
use Modules\DayOfWeek\Actions\ShowEditDayOfWeekForm;
use Modules\DayOfWeek\Actions\ViewDayOfWeek;
use Modules\DayOfWeek\Actions\DataTableOfDayOfWeek;

Route::prefix('dayofweek')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfDayOfWeek::class)->name('dayofweek.index');
    Route::get('/create', ShowCreateDayOfWeekForm::class)->name('dayofweek.create');
    Route::get('/{dayofweek}', ViewDayOfWeek::class)->name('dayofweek.show');
    Route::get('/{dayofweek}/edit', ShowEditDayOfWeekForm::class)->name('dayofweek.edit');
});
