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

Route::get('/', function () {
    return redirect('/admin');
});

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
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['web', 'auth']], function ($router) {
    $router->get('/', 'IndexController@index');
    $router->get('/i18n', 'IndexController@dataTableI18n');

    /*用户*/
    require(__DIR__ . '/Routes/UserRoute.php');
    //权限
    require(__DIR__ . '/Routes/PermissionRoute.php');
    /*菜单*/
    require(__DIR__ . '/Routes/MenuRoute.php');
    // 角色
    require(__DIR__ . '/Routes/RoleRoute.php');
    //图片
    $router->get('/image/show', 'ImageController@showImageUpload');
    $router->post('/image/upload_image', 'ImageController@postImageUpload');
    $router->get('/image/select', 'ImageController@showImageSelect');
    $router->get('/image/lib', 'ImageController@showImageLib');
    $router->get('/image/image_list', 'ImageController@showImageList');
    $router->post('/image/destroy/{id}', 'ImageController@destroy');

    //操作日志
    $router->get('/actionlog', 'ActionLogController@actionList');
    $router->get('/action/ajax', 'ActionLogController@ajaxIndex');

    //锁屏
    $router->get('/lock','IndexController@lockScreen');
    $router->post('/unlock','IndexController@unlock');

    //设置
    $router->get('/setting/switch','SettingController@webSwitch');
    $router->get('/setting/email','SettingController@emailTemple');

    //文章
    $router->resource('article','ArticleController');

    //文章分类
    $router->resource('ae_category','ArticleCategoryController');
});

Route::group([],function($router){
    
    Route::any('/wechat', 'WechatController@serve');
});
