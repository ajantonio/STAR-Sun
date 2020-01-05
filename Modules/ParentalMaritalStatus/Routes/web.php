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

use Modules\ParentalMaritalStatus\Actions\ShowCreateParentalMaritalStatusForm;
use Modules\ParentalMaritalStatus\Actions\ShowEditParentalMaritalStatusForm;
use Modules\ParentalMaritalStatus\Actions\ViewParentalMaritalStatus;
use Modules\ParentalMaritalStatus\Actions\DataTableOfParentalMaritalStatus;

Route::prefix('parentalmaritalstatus')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfParentalMaritalStatus::class)->name('parentalmaritalstatus.index');
    Route::get('/create', ShowCreateParentalMaritalStatusForm::class)->name('parentalmaritalstatus.create');
    Route::get('/{parentalmaritalstatus}', ViewParentalMaritalStatus::class)->name('parentalmaritalstatus.show');
    Route::get('/{parentalmaritalstatus}/edit', ShowEditParentalMaritalStatusForm::class)->name('parentalmaritalstatus.edit');
});
