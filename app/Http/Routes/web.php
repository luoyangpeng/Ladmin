<?php


Route::get('/', 'HomeController@index');

//文章
Route::get('/blog', 'ArticleController@index');

//文章显示页面
Route::get('/blog/{id}', 'ArticleController@show');

Route::any('/wechat', 'WechatController@serve');

Route::any('/wechat/pay', 'WechatController@pay');
Route::any('/wechat/callback', 'WechatController@callback');


