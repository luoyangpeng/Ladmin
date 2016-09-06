<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '超级管理员',
            'level' => 1,
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => '普通用户',
        ]);
        
        /*管理员初始化所有权限*/
        $all_permissions = Permission::where('status',config('admin.global.status.active'))->get();
        
        foreach($all_permissions as $all_permission){
            $adminRole->attachPermission($all_permission);
        }

        /**
         * 普通用户赋予一般权限
         */
        $loginBackendPer = Permission::where('slug', '=', 'admin.systems.login')->first();
        
        $userRole->attachPermission($loginBackendPer);
    }
}
