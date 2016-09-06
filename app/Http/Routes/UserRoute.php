<?php
/**
 * 用户路由
 */
$router->group(['prefix' => 'user'], function($router){
	$router->get('ajaxIndex', 'UserController@ajaxIndex');
	$router->get('/{id}/mark/{status}', 'UserController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
	$router->get('/{id}/reset','UserController@changePassword')->where(['id' => '[0-9]+']);
	$router->post('reset','UserController@resetPassword');

	//管理员修改密码
	$router->get('/profile/{id}','UserController@profile')->where(['id' => '[0-9]+']);
	//管理员修改信息
	$router->get('/change/{id}','UserController@changeAdminInfo')->where(['id' => '[0-9]+']);
	//管理员修改密码
	$router->post('/post_password','UserController@postAdminPassword');
	//管理员信息修改
	$router->post('/post_info','UserController@postAdminInfo');
});

$router->resource('user', 'UserController');