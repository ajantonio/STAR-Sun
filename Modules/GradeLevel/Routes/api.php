<?php

use Modules\GradeLevel\Actions\StoreNewGradeLevel;
use Modules\GradeLevel\Actions\DeleteGradeLevel;
use Modules\GradeLevel\Actions\UpdateGradeLevel;
use Modules\GradeLevel\Actions\FindGradeLevel;
use Modules\GradeLevel\Actions\GetGradeLeveldetail;
use Modules\GradeLevel\Actions\GetAllGradeLevel;

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
Route::middleware('auth:api')->prefix('gradelevel')->group(function(){
    Route::post('/', StoreNewGradeLevel::class)->name('api.gradelevel.store');
    Route::get('/{gradelevel}', FindGradeLevel::class)->name('api.gradelevel.find');
    Route::put('/{gradelevel}', UpdateGradeLevel::class)->name('api.gradelevel.update');
    Route::delete('/{gradelevel}', DeleteGradeLevel::class)->name('api.gradelevel.destroy');

    Route::get('/{gradelevel}/show', GetGradeLevelDetail::class)->name('api.gradelevel.show');
    Route::get('/', GetAllGradeLevel::class)->name('api.gradelevel.index');  
});