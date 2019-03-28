<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	// Authentication Routes
	Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

	// Registration Routes
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	//Api index page
	Route::get('/', 'PagesController@getIndex');
	
	// Convert XML data & stored in DB
	Route::get('/convert', ['uses' => 'PagesController@ConvertXMLStoreDB']);

	//Data management
	Route::get('/station', ['uses' => 'ApiController@getAllStation']);
    Route::get('/station/{id}', ['uses' => 'ApiController@getStation']);
	Route::post('/station', ['uses' => 'ApiController@postStation']);
	Route::put('/station/{id}', ['uses' => 'ApiController@updateStation']);
	Route::delete('/station/{id}', ['uses' => 'ApiController@deleteStation']);
	Route::post('/station/search', ['uses' => 'ApiController@getSearchStation']);
});
