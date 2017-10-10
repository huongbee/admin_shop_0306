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



Route::group(['prefix'=>'admin','middleware'=>'checkAdminLogin'],function(){

	Route::get('/',[
		'as'=>'home',
		'uses'=>'AdminController@getIndex'
	]);

	Route::get('list-product-type-{id}',[
		'as'=>'list-product',
		'uses'=>'AdminController@getListProductByIdType'
	])->where(['id'=>'[0-9]+']);

	Route::get('edit-type-{id}',[
		'as'=>'edit-type',
		'uses'=>'AdminController@getEditTypeByIdType'
	]);
	
	Route::post('edit-type-{id}',[
		'as'=>'edit-type',
		'uses'=>'AdminController@postEditTypeByIdType'
	]);


	Route::get('add-type',[
		'as'=>'add-type',
		'uses'=>'AdminController@getAddTypeProduct'
	]);
	Route::post('add-type',[
		'as'=>'add-type',
		'uses'=>'AdminController@postAddTypeProduct'
	]);

	Route::post('delete-type',[
		'as'=>'delete-type',
		'uses'=>'AdminController@postDeleteTypeProduct'
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

	Route::get('export-products',[
		'as' => 'export-products',
		'uses'=> 'AdminController@getExportProducts'
	]);

	Route::get('export-products-multisheet',[
		'as' => 'export-products-multisheet',
		'uses'=> 'AdminController@getExportProductsMultisheet'
	]);

	Route::get('import-products',[
		'as' => 'import-products',
		'uses'=> 'AdminController@getViewImport'
	]);

	Route::post('import-products',[
		'as' => 'import-products',
		'uses'=> 'AdminController@import'
	]);
});