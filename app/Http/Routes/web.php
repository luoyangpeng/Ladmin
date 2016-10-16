<?php


Route::get('/', 'HomeController@index');
Route::get('/reward', 'HomeController@reward');

//文章
Route::get('/blog', 'ArticleController@index');

//文章显示页面
Route::get('/blog/{id}', 'ArticleController@show');


//微信
Route::group(['prefix'=>"wechat"],function(){
    Route::any('', 'WechatController@serve');

    Route::any('/pay', 'WechatController@pay');
    Route::any('/callback', 'WechatController@callback');

    Route::any('/menu', 'WechatController@createMenu');

    Route::get('/info', 'WechatController@userInfo');
});


//消息推送

Route::get('/push/{id}','MessagePushController@push');





