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
Route::get('pdf','Expense\pdfExpenseController@getPDF');

Route::get('/', function () {
	return view('welcome');

});

Route::group(['prefix' => 'img'],function(){
	Route::get('{objectName}/{id}/{field}/{image_name}','ImageController@create');

//	Route::get('list','Expense\expenseController@submitted_List');

	Route::get('{ItemName}/list',objectRun('CCList'));

//	Route::get('pdf','Expense\pdfExpenseController@getPDF');

});

Route::group(['prefix' => 'api' ,"middleware" =>['cors','GZip']], function () {

    Route::match(['post','options'],'login', 'User\loginController@login');
	Route::match(['post','options'],'logingoogle', 'User\loginController@loginGoogle');

	Route::group(['middleware'=>"App\Http\Middleware\VerifyApiToken"],function(){

		Route::match(['post','options'],'current_user', 'User\userController@current');

		Route::get('object_home','Object\ObjectController@object_home');

		//Expense

		Route::get('{objectName}/detail/{record}', objectRun('ExpenseDetail'));

		Route::get('{objectName}/expenseList',objectRun('ExpenseList'));

		Route::get('{objectName}/ItemList',objectRun('CCList'));

		Route::get('pdf','Expense\pdfExpenseController@getPDF');

//		Route::get('{objectName}/taxi/meter', objectRun('taxi\price','Expense'));

		// end Expense

//		//user prefix
//		Route::group(['prefix' => 'user',"middleware" =>"App\Http\Middleware\VerifyProfilePermission"], function () {
		Route::group(['prefix' => 'user'], function () {
			// to get user list
			Route::get('{objectName}/list', 'User\userController@object_all_user');
			// get user detailed
			Route::get('{objectName}/detail/{record?}', 'User\userController@object_a_user');
			Route::get('{objectName}/edit/{record?}', 'User\userController@addUser');
			Route::get('{objectName}/edit/{record?}', 'User\userController@editUserPage');
			Route::match(['post', 'options'], '{objectName}/edit/{record?}', 'User\userController@saveUser');
			Route::match(['post','options'],'{objectName}/delete/{record}', 'User\userController@deleteUser');
		});
		//userstatus ,role
		Route::get('picklist/statususer/list', 'AAA\userStatusController@object_all_userstatus');
		Route::get('picklist/role/list', 'AAA\roleController@object_all_role');


		Route::get('{objectName}/edit/{record?}', objectRun('CCEdit'));

		Route::match(['post','options'],'{objectName}/edit/{record?}', objectRun('CCSave'));

		Route::match(['post','options'],'{objectName}/delete/{record}', objectRun('CCDelete'));

		Route::group(['prefix' => 'Expense'],function(){

			//Route::get('taxi/meter', objectRun('taxi\price','Expense'));

			Route::match(['post','options'],'edit/{record?}', objectRun('CCSave','Expense'));

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