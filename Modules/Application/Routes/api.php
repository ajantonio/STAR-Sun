<?php

use Illuminate\Http\Request;
use Modules\Application\Actions\GetApplicationResources;
use Modules\Application\Actions\GetAllApplications;
use Modules\Application\Http\Controllers\GetAllApplicationController;
use Modules\Application\Http\Controllers\GetApplicationResourceController;

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

Route::middleware('auth:api')->prefix('application')->group(function(){
    Route::get('/', GetAllApplications::class)->name('api.application.index');
    Route::get('{application}/resources', GetApplicationResources::class)->name('api.application.resources');
});