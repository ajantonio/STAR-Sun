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

use Modules\ContactType\Actions\ShowCreateContactTypeForm;
use Modules\ContactType\Actions\ShowEditContactTypeForm;
use Modules\ContactType\Actions\ViewContactType;
use Modules\ContactType\Actions\DataTableOfContactType;

Route::prefix('contacttype')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfContactType::class)->name('contacttype.index');
    Route::get('/create', ShowCreateContactTypeForm::class)->name('contacttype.create');
    Route::get('/{contacttype}', ViewContactType::class)->name('contacttype.show');
    Route::get('/{contacttype}/edit', ShowEditContactTypeForm::class)->name('contacttype.edit');
});
