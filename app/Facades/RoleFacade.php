<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class RoleFacade extends Facade
{
	protected static function getFacadeAccessor(){
		return 'RoleRepository';
	}
}