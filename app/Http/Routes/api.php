<?php


Route::get('/',function(){
	return redirect(url('api/docs'));
});

Route::group(['prefix'=>"v1",'namespace'=>'Api'],function(){
    Route::post('/pay','WechatController@wechatPay');
    Route::any('/test','WechatController@test');
});

