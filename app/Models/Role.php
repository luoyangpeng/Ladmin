<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActionAttributeTrait;
use Bican\Roles\Models\Role as BicanRole;
class Role extends BicanRole
{
	use ActionAttributeTrait;
    protected $table = 'roles';

    protected $fillable = ['name','slug','description','level','status'];

    private $action;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    	$this->action = config('admin.global.role.action');
    }

    public function permission()
    {
    	return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id')->withTimestamps();
    }
}
