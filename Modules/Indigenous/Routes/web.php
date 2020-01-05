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

use Modules\Indigenous\Actions\ShowCreateIndigenousForm;
use Modules\Indigenous\Actions\ShowEditIndigenousForm;
use Modules\Indigenous\Actions\ViewIndigenous;
use Modules\Indigenous\Actions\DataTableOfIndigenous;

Route::prefix('indigenous')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfIndigenous::class)->name('indigenous.index');
    Route::get('/create', ShowCreateIndigenousForm::class)->name('indigenous.create');
    Route::get('/{indigenous}', ViewIndigenous::class)->name('indigenous.show');
    Route::get('/{indigenous}/edit', ShowEditIndigenousForm::class)->name('indigenous.edit');
});
