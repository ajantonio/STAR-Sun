<?php

use Modules\FamilyRelationship\Actions\StoreNewFamilyRelationship;
use Modules\FamilyRelationship\Actions\DeleteFamilyRelationship;
use Modules\FamilyRelationship\Actions\UpdateFamilyRelationship;
use Modules\FamilyRelationship\Actions\FindFamilyRelationship;
use Modules\FamilyRelationship\Actions\GetAllFamilyRelationships;
use Modules\FamilyRelationship\Actions\GetFamilyRelationshipDetails;

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
Route::middleware('auth:api')->prefix('familyrelationship')->group(function(){
    Route::post('/', StoreNewFamilyRelationship::class)->name('api.familyrelationship.store');
    Route::get('/', GetAllFamilyRelationships::class)->name('api.familyrelationship.index');    
    Route::get('/{familyrelationship}', FindFamilyRelationship::class)->name('api.familyrelationship.find');
    Route::put('/{familyrelationship}', UpdateFamilyRelationship::class)->name('api.familyrelationship.update');
    Route::delete('/{familyrelationship}', DeleteFamilyRelationship::class)->name('api.familyrelationship.destroy');
    Route::get('/{attribute}/show', GetFamilyRelationshipDetails::class)->name('api.familyrelationship.show');
});