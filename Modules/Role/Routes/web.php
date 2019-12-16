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

use Modules\Role\Actions\ShowCreateRoleForm;
use Modules\Role\Actions\ShowEditRoleForm;
use Modules\Role\Actions\DataTableOfRole;

Route::prefix('role')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfRole::class)->name('role.index');
    Route::get('/create', ShowCreateRoleForm::class)->name('role.create');
    Route::get('/{role}/edit', ShowEditRoleForm::class)->name('role.edit');
});
