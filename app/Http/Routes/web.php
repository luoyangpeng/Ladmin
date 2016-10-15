<?php


Route::get('/', 'HomeController@index');
Route::get('/reward', 'HomeController@reward');

//文章
Route::get('/blog', 'ArticleController@index');

//文章显示页面
Route::get('/blog/{id}', 'ArticleController@show');


//微信
Route::any('/wechat', 'WechatController@serve');

Route::any('/wechat/pay', 'WechatController@pay');
Route::any('/wechat/callback', 'WechatController@callback');

Route::any('/wechat/menu', 'WechatController@createMenu');




