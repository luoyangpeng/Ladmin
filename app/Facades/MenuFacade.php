<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class MenuFacade extends Facade
{
	
	protected static function getFacadeAccessor(){
		return 'MenuRepository';
	}
}