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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/**
 * Super admin route
 */
Route::prefix(config('app.admin_prefix'))->group(function () // 'admin'
{
	Auth::routes(['register' => false]);
	Route::middleware(['auth', 'superadmin'])->group(function () {
		Route::get('/', 'Admin\DashboardController@index')->name('admin.index');
		Route::resource('users', 'Admin\UserController', ['as' => 'admin']);
	});
});

Route::get('/dashboard/home', 'Admin\DashboardController@versionone')->name('home');
Route::get('/dashboard/v2', 'Admin\DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'Admin\DashboardController@versionthree')->name('v3');

// Route::prefix('https://adminlte.io/themes/dev/AdminLTE/')->group()