<?php


Route::get('/', 'HomeController@index');
Route::any('/wechat', 'WechatController@serve');