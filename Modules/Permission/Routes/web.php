<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Permission\Actions\CreatePermission;
use Modules\Permission\Actions\EditPermission;
use Modules\Permission\Actions\ViewPermission;
use Modules\Permission\Actions\DatatableOfPermission;

Route::prefix('permission')->middleware('auth')->group(function() {
    Route::get('/', DatatableOfPermission::class)->name('permission.index');
    Route::get('/create', CreatePermission::class)->name('permission.create');
    Route::get('/{Permission}', ViewPermission::class)->name('permission.show');
    Route::get('/{Permission}/edit', EditPermission::class)->name('permission.edit');
});
