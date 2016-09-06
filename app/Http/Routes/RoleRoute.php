<?php
/**
 * 角色路由
 */
$router->group(['prefix' => 'role'], function($router){
	$router->get('ajaxIndex', 'RoleController@ajaxIndex');
	$router->get('/{id}/mark/{status}', 'RoleController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
});

$router->resource('role', 'RoleController');