<?php
/**
 * 菜单路由
 */
$router->group(['prefix' => 'menu'], function($router){
	$router->get('sort', 'MenuController@sort');
	$router->get('/{id}/mark/{status}', 'MenuController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
});

$router->resource('menu', 'MenuController');