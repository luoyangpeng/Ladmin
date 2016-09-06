<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class PermissionFacade extends Facade
{
	protected static function getFacadeAccessor(){
		return 'PermissionRepository';
	}
}