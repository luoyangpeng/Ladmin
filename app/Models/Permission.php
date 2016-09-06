<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\ActionAttributeTrait;
use Bican\Roles\Models\Permission as BicanPermission;
class Permission extends BicanPermission
{
	use ActionAttributeTrait;
	
    protected $table = 'permissions';

    protected $fillable = ['name','slug','description','model','status'];

    private $action;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    	$this->action = config('admin.global.permission.action');
    }

    public function role()
    {
    	return $this->belongsToMany('App\Models\Role');
    }

}
