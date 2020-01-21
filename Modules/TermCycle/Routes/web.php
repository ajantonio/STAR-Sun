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

use Modules\TermCycle\Actions\ShowCreateTermCycleForm;
use Modules\TermCycle\Actions\ShowEditTermCycleForm;
use Modules\TermCycle\Actions\ViewTermCycle;
use Modules\TermCycle\Actions\DataTableOfTermCycle;

Route::prefix('termcycle')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfTermCycle::class)->name('termcycle.index');
    Route::get('/create', ShowCreateTermCycleForm::class)->name('termcycle.create');
    Route::get('/{termcycle}', ViewTermCycle::class)->name('termcycle.show');
    Route::get('/{termcycle}/edit', ShowEditTermCycleForm::class)->name('termcycle.edit');
});
