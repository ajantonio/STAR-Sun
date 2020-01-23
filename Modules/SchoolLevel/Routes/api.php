<?php

use Modules\SchoolLevel\Actions\StoreNewSchoolLevel;
use Modules\SchoolLevel\Actions\DeleteSchoolLevel;
use Modules\SchoolLevel\Actions\UpdateSchoolLevel;
use Modules\SchoolLevel\Actions\FindSchoolLevel;
use Modules\SchoolLevel\Actions\GetSchoolLevelDetail;
use Modules\SchoolLevel\Actions\GetAllSchoolLevel;

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
Route::middleware('auth:api')->prefix('schoollevel')->group(function(){
    Route::post('/', StoreNewSchoolLevel::class)->name('api.schoollevel.store');
    Route::get('/{schoollevel}', FindSchoolLevel::class)->name('api.schoollevel.find');
    Route::put('/{schoollevel}', UpdateSchoolLevel::class)->name('api.schoollevel.update');
    Route::delete('/{schoollevel}', DeleteSchoolLevel::class)->name('api.schoollevel.destroy');

    Route::get('/{schoollevel}/show', GetSchoolLevelDetail::class)->name('api.schoollevel.show');
    Route::get('/', GetAllSchoolLevel::class)->name('api.schoollevel.index');  
});