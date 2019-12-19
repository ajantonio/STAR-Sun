<?php

use Modules\Test\Actions\StoreNewTest;
use Modules\Test\Actions\DeleteTest;
use Modules\Test\Actions\UpdateTest;
use Modules\Test\Actions\FindTest;

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
Route::middleware('auth:api')->prefix('test')->group(function(){
    Route::post('/', StoreNewTest::class)->name('api.test.store');
    Route::get('/{test}', FindTest::class)->name('api.test.find');
    Route::put('/{test}', UpdateTest::class)->name('api.test.update');
    Route::delete('/{test}', DeleteTest::class)->name('api.test.destroy');
});