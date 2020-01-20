<?php

use Modules\AddressType\Actions\GetAddressTypeDetails;
use Modules\AddressType\Actions\GetAllAddressType;
use Modules\AddressType\Actions\StoreNewAddressType;
use Modules\AddressType\Actions\DeleteAddressType;
use Modules\AddressType\Actions\UpdateAddressType;
use Modules\AddressType\Actions\FindAddressType;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->prefix('addresstype')->group(function(){
    Route::post('/', StoreNewAddressType::class)->name('api.addresstype.store');
    Route::get('/', GetAllAddressType::class)->name('api.addresstype.index');
    Route::get('/{addresstype}', FindAddressType::class)->name('api.addresstype.find');
    Route::put('/{addresstype}', UpdateAddressType::class)->name('api.addresstype.update');
    Route::delete('/{addresstype}', DeleteAddressType::class)->name('api.addresstype.destroy');
    Route::get('/{addresstype}/show', GetAddressTypeDetails::class)->name('api.addresstype.show');
});