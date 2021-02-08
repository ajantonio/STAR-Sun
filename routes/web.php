<?php

use Illuminate\Support\Facades\Route;

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

/**
 * Auth routes
 */
Route::get('/redirect', 'Auth\LoginController@redirect')->name('login');
Route::get('/auth/callback', 'Auth\LoginController@callback')->name('auth.callback');
Route::get('/auth/user', 'Auth\LoginController@getUserInfo')->name('auth.user');
Route::get('/logout/callback', 'Auth\LoginController@loggedOutCallback')->name('logout.callback');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Custom login routes
Route::get('/login', 'HomeController@login')->name('home.login');
Route::post('/login', 'HomeController@auth')->name('home.auth');
Route::get('/logout', 'HomeController@logout')->name('home.logout');

//Create dummy users
Route::get('/create/dummy/user', 'HomeController@dummyUser');
Route::get('/create/dummy/admin', 'HomeController@dummyAdmin');
Route::get('/create/dummy/faculty', 'HomeController@dummyFaculty');
Route::get('/create/dummy/studOrg', 'HomeController@dummyStudOrg');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
