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


Auth::routes();
Route::get('/', function () {
	if (Auth::check()) {
		return redirect()->route('home');
	}
    return view('welcome');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

// Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function(){
	
	Route::get('/', 									'AdminController@index')		->name('admin.index');
	Route::get('/user', 								'UserController@index')			->name('user.index');
	Route::get('create', 								'UserController@create')		->name('user.create');
	Route::post('register', 							'UserController@register')		->name('user.register');
	Route::resource('file',								'FileController');
	Route::get('download/{id}',							'FileController@download')		->name('file.download');

});



