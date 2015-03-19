<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('admin', 'Admin\AdminController@index');
//Route::get('admin/user','Admin\UserController@index');
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
     Route::get('user',[
        'as'=>'user','uses'=>'UserController@index'
     ]);
     Route::get('user/{id}/edit',[
        'as'=>'user-edit','uses'=>'UserController@edit'
     ]);
     Route::get('user/{id}/profile',[
        'as'=>'user-profile','uses'=>'UserController@profile'
     ]);
             
    /*
     *角色部分
     */
     Route::get('role',[
        'as'=>'role','uses'=>'RoleController@index'
     ]);
     Route::get('role/create',[
        'as'=>'role-create','uses'=>'RoleController@create'
     ]);
     Route::post('role/store',[
        'as'=>'role-store','uses'=>'RoleController@store'
     ]);
     Route::get('role/{id}/edit',[
        'as'=>'role-edit','uses'=>'RoleController@edit'
     ]);
     Route::post('role/update',[
        'as'=>'role-update','uses'=>'RoleController@update'
     ]);
     Route::get('role/{id}/can',[
        'as'=>'role-can','uses'=>'RoleController@can'
     ]);
     Route::post('role/updateCan',[
        'as'=>'role-updateCan','uses'=>'RoleController@updateCan'
     ]);
     Route::post('role/{id}/destroy',[
        'as'=>'role-destroy','uses'=>'RoleController@destroy'
     ]);
    /*
     * 权限部分
     *
     */
     Route::get('permission',[
        'as'=>'permission','uses'=>'PermissionController@index'
     ]);
     Route::get('permission/create',[
        'as'=>'permission-create','uses'=>'PermissionController@create'
     ]);
     Route::post('permission/store',[
        'as'=>'permission-store','uses'=>'PermissionController@store'
     ]);
     Route::get('permission/{id}/edit',[
        'as'=>'permission-edit','uses'=>'PermissionController@edit'
     ]);
     Route::post('permission/update',[
        'as'=>'permission-update','uses'=>'PermissionController@update'
     ]);

             
     ///
     Route::get('user/test',[
        'as'=>'user-test','uses'=>'UserController@test'
     ]);

});