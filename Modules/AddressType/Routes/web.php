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

use Modules\AddressType\Actions\ShowCreateAddressTypeForm;
use Modules\AddressType\Actions\ShowEditAddressTypeForm;
use Modules\AddressType\Actions\ViewAddressType;
use Modules\AddressType\Actions\DataTableOfAddressType;

Route::prefix('addresstype')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfAddressType::class)->name('addresstype.index');
    Route::get('/create', ShowCreateAddressTypeForm::class)->name('addresstype.create');
    Route::get('/{addresstype}', ViewAddressType::class)->name('addresstype.show');
    Route::get('/{addresstype}/edit', ShowEditAddressTypeForm::class)->name('addresstype.edit');
});
