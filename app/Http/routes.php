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
//前端页面
Route::group(['namespace' => 'Home'],function(){
    Route::Controller('user','UserController');
    Route::post('follow',[
        'as'=>'follow','uses'=>'FollowController@store'
    ]);
    Route::post('unfollow',[
        'as'=>'unfollow','uses'=>'FollowController@destroy'
    ]);

    Route::get('search',[
        'as'=>'search','uses'=>'SearchController@index'
    ]);
    Route::get('search/result',[
        'as'=>'search.search','uses'=>'SearchController@search'
    ]);
});




//==================================================================//

Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){

    Route::get('/', 'AdminController@index');

    Route::get('user',[
        'as'=>'admin.user','uses'=>'UserController@index'
    ]);
    Route::get('user/create',[
        'as'=>'admin.user.create','uses'=>'UserController@create'
    ]);
    Route::post('user/store',[
        'as'=>'admin.user.store','uses'=>'UserController@store'
    ]);
    Route::get('user/{id}/edit',[
        'as'=>'admin.user.edit','uses'=>'UserController@edit'
    ]);
    Route::post('user/update',[
        'as'=>'admin.user.update','uses'=>'UserController@update'
    ]);
    Route::get('user/{id}/profile',[
        'as'=>'admin.user.profile','uses'=>'UserController@profile'
    ]);

             
    /*
     *角色部分
     */
    Route::get('role',[
        'as'=>'admin.role','uses'=>'RoleController@index'
    ]);
    Route::get('role/create',[
        'as'=>'admin.role.create','uses'=>'RoleController@create'
    ]);
    Route::post('role/store',[
        'as'=>'admin.role.store','uses'=>'RoleController@store'
    ]);
    Route::get('role/{id}/edit',[
        'as'=>'admin.role.edit','uses'=>'RoleController@edit'
    ]);
    Route::post('role/update',[
        'as'=>'admin.role.update','uses'=>'RoleController@update'
    ]);
    Route::get('role/{id}/can',[
        'as'=>'admin.role.can','uses'=>'RoleController@can'
    ]);
    Route::post('role/updateCan',[
        'as'=>'admin.role.updateCan','uses'=>'RoleController@updateCan'
    ]);
    Route::post('role/{id}/destroy',[
        'as'=>'admin.role.destroy','uses'=>'RoleController@destroy'
    ]);
    /*
     * 权限部分
     *
     */
    Route::get('permission',[
        'as'=>'admin.permission','uses'=>'PermissionController@index'
    ]);
    Route::get('permission/create',[
        'as'=>'admin.permission.create','uses'=>'PermissionController@create'
    ]);
    Route::post('permission/store',[
        'as'=>'admin.permission.store','uses'=>'PermissionController@store'
    ]);
    Route::get('permission/{id}/edit',[
        'as'=>'admin.permission.edit','uses'=>'PermissionController@edit'
    ]);
    Route::post('permission/update',[
        'as'=>'admin.permission.update','uses'=>'PermissionController@update'
    ]);

     ///
    Route::get('user/test',[
        'as'=>'admin.user.test','uses'=>'UserController@test'
    ]);

    Route::resource('post', 'PostController',['names'=>['index'=>'admin.post']]);

    // 操作文件
    Route::get('keyword',[
        'as'=>'admin.keyword','uses'=>'KeywordController@index'
    ]);
    Route::post('keyword',[
        'as'=>'admin.keyword.store','uses'=>'KeywordController@putContent'
    ]);

    //上传封面
    Route::resource('cover', 'CoverController',['names'=>['index'=>'admin.cover']]);
    //App版本
    Route::resource('version', 'VersionController',['names'=>['index'=>'admin.version']]);
});

/*文件上传*/
Route::post('upload',[
    'as'=>'upload','uses'=>'UploadController@upload'
]);
Route::post('uploadfile',[
    'as'=>'uploadfile','uses'=>'UploadController@upload'
]);

/*API*/

Route::group(['namespace'=>'Api\V1','prefix'=>'api/v1'],function(){

    //Route::controllers(['auth'=>'AuthController']);

    Route::get('entry','SystemController@versionCode');

    Route::get('posts/list/count/{count}/{offset?}/{order?}/{time?}','PostsController@getList');

    Route::get('posts/paginate/{count}','PostsController@getArticlePage');

    //Route::resource('posts','PostsController');


});

//Route::get('search/{keyword}','SearchController@search');