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
  
//后台路由
Route::group(['domain'=>env('ADMIN_DOMAIN'),'middleware' => ['web']],function(){
    Route::auth();
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['auth']], function ($router) {

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
});

//前台路由
Route::group(['domain'=>env('FRONT_DOMAIN'),'middleware' => ['web'] ],function($router){

    require(__DIR__ . '/Routes/web.php');
});

//登录路由
Route::group(['domain'=>env('LOGIN_DOMAIN')],function($router){
    
    require(__DIR__ . '/Routes/login.php');
});


//Api 路由
Route::group(['domain'=>env('API_DOMAIN'),'middleware' => ['web','sso'] ],function($router){
 
    require(__DIR__ . '/Routes/api.php');
});