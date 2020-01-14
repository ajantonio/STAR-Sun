<?php

use Modules\School\Actions\StoreNewSchool;
use Modules\School\Actions\DeleteSchool;
use Modules\School\Actions\UpdateSchool;
use Modules\School\Actions\FindSchool;

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
Route::middleware('auth:api')->prefix('school')->group(function(){
    Route::post('/', StoreNewSchool::class)->name('api.school.store');
    Route::get('/{school}', FindSchool::class)->name('api.school.find');
    Route::put('/{school}', UpdateSchool::class)->name('api.school.update');
    Route::delete('/{school}', DeleteSchool::class)->name('api.school.destroy');
});