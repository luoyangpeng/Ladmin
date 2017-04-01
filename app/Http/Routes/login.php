<?php

Route::group(['namespace'=>'Login','middleware' => ['web'] ], function() {
    Route::get('/login','LoginController@showLoginForm');
    Route::post('/login','LoginController@login');

    // 注册路由...
    Route::get('/register', 'LoginController@getRegister');
    Route::post('/register', 'LoginController@postRegister');


    Route::get('/logout', 'LoginController@logout');

   //获取登录用户信息接口
    Route::get('/sso/user_info', 'SSOServerController@getUserInfo');
});