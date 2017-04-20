<?php


Route::get('/', 'HomeController@index');
Route::get('/reward', 'HomeController@reward');
//小应用
Route::get('/program','HomeController@application');

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

    //分享
    Route::get('/share','WechatController@share');
});


//消息推送

Route::get('/push','MessagePushController@push');

//聊天
Route::get('/chat','MessagePushController@chat');




//直播

Route::group(['prefix'=>'live','middleware'=>['sso']], function() {
	Route::get('/', 'LiveController@liveList');
	Route::get('/info/{roomId}', 'LiveController@liveInfo');
});









