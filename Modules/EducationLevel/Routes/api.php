<?php

use Modules\EducationLevel\Actions\StoreNewEducationLevel;
use Modules\EducationLevel\Actions\DeleteEducationLevel;
use Modules\EducationLevel\Actions\UpdateEducationLevel;
use Modules\EducationLevel\Actions\FindEducationLevel;

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
Route::middleware('auth:api')->prefix('educationlevel')->group(function(){
    Route::post('/', StoreNewEducationLevel::class)->name('api.educationlevel.store');
    Route::get('/{educationlevel}', FindEducationLevel::class)->name('api.educationlevel.find');
    Route::put('/{educationlevel}', UpdateEducationLevel::class)->name('api.educationlevel.update');
    Route::delete('/{educationlevel}', DeleteEducationLevel::class)->name('api.educationlevel.destroy');
});