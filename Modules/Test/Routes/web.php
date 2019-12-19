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

use Modules\Test\Actions\ShowCreateTestForm;
use Modules\Test\Actions\ShowEditTestForm;
use Modules\Test\Actions\ViewTest;
use Modules\Test\Actions\DataTableOfTest;

Route::prefix('test')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfTest::class)->name('test.index');
    Route::get('/create', ShowCreateTestForm::class)->name('test.create');
    Route::get('/{test}', ViewTest::class)->name('test.show');
    Route::get('/{test}/edit', ShowEditTestForm::class)->name('test.edit');
});
