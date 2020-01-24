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

use Modules\TermPeriodEvent\Actions\ShowCreateTermPeriodEventForm;
use Modules\TermPeriodEvent\Actions\ShowEditTermPeriodEventForm;
use Modules\TermPeriodEvent\Actions\ViewTermPeriodEvent;
use Modules\TermPeriodEvent\Actions\DataTableOfTermPeriodEvent;

Route::prefix('termperiodevent')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfTermPeriodEvent::class)->name('termperiodevent.index');
    Route::get('/create', ShowCreateTermPeriodEventForm::class)->name('termperiodevent.create');
    Route::get('/{termperiodevent}', ViewTermPeriodEvent::class)->name('termperiodevent.show');
    Route::get('/{termperiodevent}/edit', ShowEditTermPeriodEventForm::class)->name('termperiodevent.edit');
});
