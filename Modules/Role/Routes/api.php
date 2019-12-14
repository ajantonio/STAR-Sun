<?php

use Modules\Role\Actions\CreateRole;
use Modules\Role\Actions\DeleteRole;
use Modules\Role\Actions\EditRole;
use Modules\Role\Actions\ViewRole;

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
Route::middleware('auth:api')->prefix('role')->group(function(){
    Route::post('/', CreateRole::class)->name('api.role.store');
    Route::get('/{Role}', ViewRole::class)->name('api.role.show');
    Route::put('/{Role}', EditRole::class)->name('api.role.update');
    Route::delete('/{Role}', DeleteRole::class)->name('api.role.destroy');
});