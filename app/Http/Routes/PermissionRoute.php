<?php
/**
 * 权限路由
 */
$router->group(['prefix' => 'permission'], function($router){
	$router->get('ajaxIndex', 'PermissionController@ajaxIndex');
	$router->get('/{id}/mark/{status}', 'PermissionController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
});

$router->resource('permission', 'PermissionController');