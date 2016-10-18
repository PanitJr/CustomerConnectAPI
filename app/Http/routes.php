<?php

use App\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Object\ObjectController;

if (! function_exists('objectRun')) {
	
	/**
	 * objectRun For create dynamic controller for route
	 * @param  String $ProcessFile 	[custome object file process name]
	 * @return Function             [function for route]
	 */
	function objectRun($ProcessFile,$mainObjectName = null) {
		return function(Request $Request,$objectName = null) use ($ProcessFile,$mainObjectName) {	
			$objectName = !$mainObjectName?$objectName:$mainObjectName;
			return ObjectController::getResult($Request,$objectName,$ProcessFile);
		};
	}
}

Route::get('/', function () {
	return view('welcome');
});

Route::group(['prefix' => 'img'],function(){
	Route::get('{objectName}/{id}/{field}/{image_name}','ImageController@create');

});

Route::group(['prefix' => 'api' ,"middleware" =>['cors','GZip']], function () {

    Route::get('object_home','Object\ObjectController@object_home');

	Route::match(['post','options'],'login', 'User\loginController@login');

	Route::group(['middleware'=>"App\Http\Middleware\VerifyApiToken"],function(){		

		Route::match(['post','options'],'current_user', 'User\userController@current');

		//Route::get('object_home','Object\ObjectController@object_home');

		Route::get('{objectName}/list',objectRun('CCList'));	

		Route::get('{objectName}/detail/{record}', objectRun('CCDetail'));

		Route::get('{objectName}/edit/{record?}', objectRun('CCEdit'));

		Route::match(['post','options'],'{objectName}/edit/{record?}', objectRun('CCSave'));

		Route::match(['post','options'],'{objectName}/delete/{record}', objectRun('CCDelete'));

		Route::group(['prefix' => 'Expen'],function(){

			Route::get('taxi/mitor', objectRun('taxi\price','Expen'));

			Route::match(['post','options'],'edit/{record?}', objectRun('CCSave','Expen'));			
		});					

		/**
		 * Setting API
		 * api for admin setup system 
		 */
		Route::group(['prefix' => 'Settings'], function () {
			/**
			 * Layout setting
			 */
			Route::group(['prefix' => 'Layout'], function () {
				Route::get('objectAll', 'Object\Settings\LayoutController@objectAll');	
				Route::get('object/{objectName}', 'Object\Settings\LayoutController@object');	
			});
		});
			

	});

	/**
	 * CRUD for Objects
	 * should be moved inside 'middleware' group afterward
	 */
	Route::group(['prefix' => 'object'], function () {
		Route::match(['post','options'],'create', 'Object\ObjectController@createObject');
		Route::get('list', 'Object\ObjectController@getObjectList');
		Route::get('detail/{objectName}', 'Object\ObjectController@getObject');
		Route::match(['post','options'],'edit/{objectName}', 'Object\ObjectController@editObject');
		Route::match(['post','options'],'delete/{objectName}', 'Object\ObjectController@deleteObject');
	});


});