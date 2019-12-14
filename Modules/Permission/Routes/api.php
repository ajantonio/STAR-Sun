<?php

use Modules\Permission\Actions\CreatePermission;
use Modules\Permission\Actions\DeletePermission;
use Modules\Permission\Actions\EditPermission;
use Modules\Permission\Actions\ViewPermission;

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
Route::middleware('auth:api')->prefix('permission')->group(function(){
    Route::post('/', CreatePermission::class)->name('api.permission.store');
    Route::get('/{Permission}', ViewPermission::class)->name('api.permission.show');
    Route::put('/{Permission}', EditPermission::class)->name('api.permission.update');
    Route::delete('/{Permission}', DeletePermission::class)->name('api.permission.destroy');
});