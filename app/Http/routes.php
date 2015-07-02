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

    Route::get('post/{id}',[
        'as'=>'post.show','uses'=>'PostController@show'
    ]);
});

Route::get('download',[
    'as'=>'download','uses'=>'Home\DownloadController@index'
]);
//文件下载响应
Route::get('download/last',[
    'as'=>'download.last','uses'=>'Home\DownloadController@downloadFile'
]);


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
    //post manager
    Route::get('post/{id}/check',[
        'as'=>'admin.post.check','uses'=>'PostController@check'
    ]);

    Route::get('post/{id}/lock',[
        'as'=>'admin.post.lock','uses'=>'PostController@lock'
    ]);
    Route::get('post/{id}/unlock',[
        'as'=>'admin.post.unlock','uses'=>'PostController@unlock'
    ]);

    Route::get('post/{id}/refresh',[
        'as'=>'admin.post.refresh','uses'=>'PostController@refresh'
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

Route::group(['namespace'=>'Api\Verone','prefix'=>'api/v1'],function(){

    //Route::controllers(['auth'=>'AuthController']);

    Route::get('entry','SystemController@versionCode');

    Route::get('posts/daylist','PostsController@getList');

    Route::get('posts/paginate/{count}/list','PostsController@getArticlePage');

    Route::get('posts/{id}','PostsController@show');

    Route::get('post/{postId}/likers','PostsController@getPostLikeUsers');

    //内容搜索
    Route::post('search','SearchController@search');

    /*
     * 登录
     * */
    Route::get('login/{socialiteName}','AuthController@login');
    Route::get('logout','AuthController@logout');
    Route::post('login','AuthController@appLogin');

    //用户喜欢接口
    Route::get('user/{userId}/{postid}/like','UsersController@userLikePost');
    Route::get('user/{userId}/{postid}/unlike','UsersController@userUnlikePost');
    Route::get('user/{userId}/likes','UsersController@getUserlikePosts');

    //用户中心接口
    //修改用户资料
    Route::post('user/{userId}/update','UsersController@update');

    //Route::resource('user','UsersController');

    //用户反馈
    Route::resource('feedback','FeedbackController',
        ['only'=>['store']]);
//    Route::post('feedback','FeedbackController@store');

    //版本
    Route::get('version','VersionController@getLastVersion');

    //启动封面
    Route::get('cover','CoverController@getLastCover');

});

//Route::get('search/{keyword}','SearchController@search');