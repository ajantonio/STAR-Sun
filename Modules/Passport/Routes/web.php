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


use Modules\Passport\Actions\ViewPassportClientPage;

Route::prefix('passport-client')->middleware('auth')->group(function() {
    Route::get('/', ViewPassportClientPage::class)->name('passport.index');
});
