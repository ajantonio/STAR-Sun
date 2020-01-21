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

use Modules\Term\Actions\ShowCreateTermForm;
use Modules\Term\Actions\ShowEditTermForm;
use Modules\Term\Actions\ViewTerm;
use Modules\Term\Actions\DataTableOfTerm;

Route::prefix('term')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfTerm::class)->name('term.index');
    Route::get('/create', ShowCreateTermForm::class)->name('term.create');
    Route::get('/{term}', ViewTerm::class)->name('term.show');
    Route::get('/{term}/edit', ShowEditTermForm::class)->name('term.edit');
});
