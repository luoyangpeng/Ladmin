<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Bican\Roles\Traits\HasRoleAndPermission;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\ActionAttributeTrait;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission,ActionAttributeTrait;

    private $action;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->action = config('admin.global.user.action');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','confirm_email'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function permission()
    {
        return $this->belongsToMany('App\Models\Permission','permission_user','user_id','permission_id')->withTimestamps();
    }

    public function role()
    {
        return $this->belongsToMany('App\Models\Role','role_user','user_id','role_id')->withTimestamps();
    }
}
