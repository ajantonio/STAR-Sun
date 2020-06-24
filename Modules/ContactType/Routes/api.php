<?php

use Modules\ContactType\Actions\GetAllContactType;
use Modules\ContactType\Actions\GetContactTypeDetails;
use Modules\ContactType\Actions\StoreNewContactType;
use Modules\ContactType\Actions\DeleteContactType;
use Modules\ContactType\Actions\UpdateContactType;
use Modules\ContactType\Actions\FindContactType;

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

Route::middleware('auth:api')->prefix('contacttype')->group(function () {
    Route::post('/', StoreNewContactType::class)->name('api.contacttype.store');
    Route::get('/', GetAllContactType::class)->name('api.contacttype.all');
    Route::get('/{contacttype}', FindContactType::class)->name('api.contacttype.find');
    Route::put('/{contacttype}', UpdateContactType::class)->name('api.contacttype.update');
    Route::delete('/{contacttype}', DeleteContactType::class)->name('api.contacttype.destroy');
    Route::get('/{contacttype}/show', GetContactTypeDetails::class)->name('api.contacttype.show');
});
