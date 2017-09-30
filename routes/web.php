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
Route::get('register',[
	'as' => 'register',
	'uses' => 'AdminController@getRegister'
]);
Route::post('register',[
	'as' => 'register',
	'uses' => 'AdminController@postRegister'
]);


Route::get('login',[
	'as' => 'login',
	'uses' => 'AdminController@getLogin'
]);

Route::post('login',[
	'as' => 'login',
	'uses' => 'AdminController@postLogin'
])->middleware('checkUserActive');



Route::group(['prefix'=>'admin'],function(){

	Route::get('/',[
		'as'=>'home',
		'uses'=>'AdminController@getIndex'
	]);

	Route::get('list-user',[
		'as' => 'list-user',
		'uses'=> 'AdminController@getListUser'
	]);

	Route::get('edit-user/{id}/{status}',[
		'as' => 'edit-user',
		'uses'=> 'AdminController@getEditUser'
	]);


	Route::get('logout',[
		'as'=>'logout',
		'uses' => 'AdminController@getLogout'
	]);

});