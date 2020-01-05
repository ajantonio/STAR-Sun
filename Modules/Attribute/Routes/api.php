<?php

use Modules\Attribute\Actions\StoreNewAttribute;
use Modules\Attribute\Actions\DeleteAttribute;
use Modules\Attribute\Actions\UpdateAttribute;
use Modules\Attribute\Actions\FindAttribute;
use Modules\Attribute\Actions\GetAllAttributes;
use Modules\Attribute\Actions\GetAttributeDetails;

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
Route::middleware('auth:api')->prefix('attribute')->group(function(){
    Route::post('/', StoreNewAttribute::class)->name('api.attribute.store');
    Route::get('/', GetAllAttributes::class)->name('api.attribute.index');    
    Route::get('/{attribute}', FindAttribute::class)->name('api.attribute.find');
    Route::put('/{attribute}', UpdateAttribute::class)->name('api.attribute.update');
    Route::delete('/{attribute}', DeleteAttribute::class)->name('api.attribute.destroy');
    Route::get('/{attribute}/show', GetAttributeDetails::class)->name('api.attribute.show');
});