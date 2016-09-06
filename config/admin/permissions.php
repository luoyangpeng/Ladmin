<?php
return[
	'permission' => [
		'create' 	=> 'admin.permissions.create',
		'edit' 		=> 'admin.permissions.edit',
		'destroy' 	=> 'admin.permissions.delete',
		'trash' 	=> 'admin.permissions.trash',
		'undo' 		=> 'admin.permissions.undo',
		'list' 		=> 'admin.permissions.list',
		'audit'		=> 'admin.permissions.audit'
	],
	'role' => [
		'create' 	=> 'admin.roles.create',
		'edit' 		=> 'admin.roles.edit',
		'destroy' 	=> 'admin.roles.delete',
		'trash' 	=> 'admin.roles.trash',
		'undo' 		=> 'admin.roles.undo',
		'list' 		=> 'admin.roles.list',
		'audit'		=> 'admin.roles.audit',
		'show'		=> 'admin.roles.show',
	],
	'user' => [
		'create' 	=> 'admin.users.create',
		'edit' 		=> 'admin.users.edit',
		'destroy' 	=> 'admin.users.delete',
		'trash' 	=> 'admin.users.trash',
		'undo' 		=> 'admin.users.undo',
		'list' 		=> 'admin.users.list',
		'audit'		=> 'admin.users.audit',
		'show'		=> 'admin.users.show',
		'reset'		=> 'admin.users.reset',
	],
	'menu' => [
		'create' 	=> 'admin.menus.create',
		'edit' 		=> 'admin.menus.edit',
		'destroy' 	=> 'admin.menus.delete',
	],
	'actionlog'=> [
		'show' 	=> 'admin.actionlog.show',

	],
	'article' =>[
		'create' 	=> 'admin.article.create',
		'edit' 		=> 'admin.article.edit',
		'destroy' 	=> 'admin.article.delete',
		'trash' 	=> 'admin.article.trash',
		'undo' 		=> 'admin.article.undo',
		'audit'		=> 'admin.article.audit',
		'show'		=> 'admin.article.list',
	],
	'articleCategory' =>[
		'create' 	=> 'admin.articleCategory.create',
		'edit' 		=> 'admin.articleCategory.edit',
		'destroy' 	=> 'admin.articleCategory.delete',
		'trash' 	=> 'admin.article.trash',
		'undo' 		=> 'admin.article.undo',
		'audit'		=> 'admin.article.audit',
		'show'		=> 'admin.article.list',
	],
];