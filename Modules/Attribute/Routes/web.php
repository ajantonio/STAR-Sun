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

use Modules\Attribute\Actions\ShowCreateAttributeForm;
use Modules\Attribute\Actions\ShowEditAttributeForm;
use Modules\Attribute\Actions\ViewAttribute;
use Modules\Attribute\Actions\DataTableOfAttribute;

Route::prefix('attribute')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfAttribute::class)->name('attribute.index');
    Route::get('/create', ShowCreateAttributeForm::class)->name('attribute.create');
    Route::get('/{attribute}', ViewAttribute::class)->name('attribute.show');
    Route::get('/{attribute}/edit', ShowEditAttributeForm::class)->name('attribute.edit');
});
