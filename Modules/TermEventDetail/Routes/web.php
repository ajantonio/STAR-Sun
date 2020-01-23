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

use Modules\TermEventDetail\Actions\ShowCreateTermEventDetailForm;
use Modules\TermEventDetail\Actions\ShowEditTermEventDetailForm;
use Modules\TermEventDetail\Actions\ViewTermEventDetail;
use Modules\TermEventDetail\Actions\DataTableOfTermEventDetail;

Route::prefix('termeventdetail')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfTermEventDetail::class)->name('termeventdetail.index');
    Route::get('/create', ShowCreateTermEventDetailForm::class)->name('termeventdetail.create');
    Route::get('/{termeventdetail}', ViewTermEventDetail::class)->name('termeventdetail.show');
    Route::get('/{termeventdetail}/edit', ShowEditTermEventDetailForm::class)->name('termeventdetail.edit');
});
