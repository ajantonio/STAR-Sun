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

use Modules\Role\Actions\CreateRole;
use Modules\Role\Actions\EditRole;
use Modules\Role\Actions\ViewRole;
use Modules\Role\Actions\DatatableOfRole;

Route::prefix('role')->middleware('auth')->group(function() {
    Route::get('/', DatatableOfRole::class)->name('role.index');
    Route::get('/create', CreateRole::class)->name('role.create');
    Route::get('/{Role}', ViewRole::class)->name('role.show');
    Route::get('/{Role}/edit', EditRole::class)->name('role.edit');
});
