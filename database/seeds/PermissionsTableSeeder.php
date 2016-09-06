<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //////////
        //系统管理//
        //////////
        Permission::create([
            'name' => 'systems manage',
            'slug' => 'admin.systems.manage',
            'description' => '系统管理'
        ]);
        //////////////////
        ///登录后台权限 //
        /////////////////

        Permission::create([
            'name' => 'login backend',
            'slug' => 'admin.systems.login',
            'description' => '登录后台权限'
        ]);

        Permission::create([
            'name' => 'backend index',
            'slug' => 'admin.systems.index',
            'description' => '后台首页'
        ]);

        Permission::create([
            'name' => 'Show Log All',
            'slug' => 'admin.logs.all',
            'description' => '显示日志总览'
        ]);

        Permission::create([
            'name' => 'Show Log List',
            'slug' => 'admin.logs.list',
            'description' => '显示日志列表'
        ]);



        /**
         * 显示菜单列表
         */
        Permission::create([
            'name' => 'Show Menus list',
            'slug' => 'admin.menus.list',
            'description' => '显示菜单列表'
        ]);

        /**
         * 创建菜单
         */
        Permission::create([
            'name' => 'Menus create',
            'slug' => 'admin.menus.create',
            'description' => '创建菜单'
        ]);

        /**
         * 删除菜单
         */
        Permission::create([
            'name' => 'Menus delete',
            'slug' => 'admin.menus.delete',
            'description' => '删除菜单'
        ]);

        /**
         * 修改菜单
         */
        Permission::create([
            'name' => 'Menus edit',
            'slug' => 'admin.menus.edit',
            'description' => '修改菜单'
        ]);

        /////////////
        //角色管理 //
        ////////////

        /**
         * 显示角色列表
         */
        Permission::create([
            'name' => 'Show roles list',
            'slug' => 'admin.roles.list',
            'description' => '显示角色列表'
        ]);

        /**
         * 创建角色
         */
        Permission::create([
            'name' => 'roles create',
            'slug' => 'admin.roles.create',
            'description' => '创建角色'
        ]);

        /**
         * 删除角色
         */
        Permission::create([
            'name' => 'roles delete',
            'slug' => 'admin.roles.delete',
            'description' => '删除角色'
        ]);

        /**
         * 修改角色
         */
        Permission::create([
            'name' => 'roles edit',
            'slug' => 'admin.roles.edit',
            'description' => '修改角色'
        ]);

        /**
         * 通过角色
         */
        Permission::create([
            'name' => 'roles audit',
            'slug' => 'admin.roles.audit',
            'description' => '通过角色'
        ]);

        /**
         * 禁用角色
         */
        Permission::create([
            'name' => 'roles trash',
            'slug' => 'admin.roles.trash',
            'description' => '禁用角色'
        ]);

        /**
         * 恢复角色
         */
        Permission::create([
            'name' => 'roles.undo',
            'slug' => 'admin.roles.undo',
            'description' => '恢复角色'
        ]);

        /**
         * 查看角色权限
         */
        Permission::create([
            'name' => 'roles.show',
            'slug' => 'admin.roles.show',
            'description' => '查看角色权限'
        ]);


        /////////////
        //权限管理 //
        ////////////

        /**
         * 显示权限列表
         */
        Permission::create([
            'name' => 'Show permissions list',
            'slug' => 'admin.permissions.list',
            'description' => '显示权限列表'
        ]);

        /**
         * 创建权限
         */
        Permission::create([
            'name' => 'permissions create',
            'slug' => 'admin.permissions.create',
            'description' => '创建权限'
        ]);

        /**
         * 删除权限
         */
        Permission::create([
            'name' => 'permissions delete',
            'slug' => 'admin.permissions.delete',
            'description' => '删除权限'
        ]);

        /**
         * 修改权限
         */
        Permission::create([
            'name' => 'permissions edit',
            'slug' => 'admin.permissions.edit',
            'description' => '修改权限'
        ]);
        /**
         * 禁用权限
         */
        Permission::create([
            'name' => 'permissions trash',
            'slug' => 'admin.permissions.trash',
            'description' => '禁用权限'
        ]);

        /**
         * 恢复权限
         */
        Permission::create([
            'name' => 'permissions undo',
            'slug' => 'admin.permissions.undo',
            'description' => '恢复权限'
        ]);

        /**
         * 通过权限
         */
        Permission::create([
            'name' => 'permissions audit',
            'slug' => 'admin.permissions.audit',
            'description' => '通过权限'
        ]);

        /////////////
        //用户管理 //
        ////////////

        /**
         * 显示用户列表
         */
        Permission::create([
            'name' => 'Show users list',
            'slug' => 'admin.users.list',
            'description' => '显示用户列表'
        ]);

        /**
         * 创建用户
         */
        Permission::create([
            'name' => 'users create',
            'slug' => 'admin.users.create',
            'description' => '创建用户'
        ]);

        /**
         * 删除用户
         */
        Permission::create([
            'name' => 'users delete',
            'slug' => 'admin.users.delete',
            'description' => '删除用户'
        ]);

        /**
         * 修改用户
         */
        Permission::create([
            'name' => 'users edit',
            'slug' => 'admin.users.edit',
            'description' => '修改用户'
        ]);

        /**
         * 通过用户
         */
        Permission::create([
            'name' => 'users audit',
            'slug' => 'admin.users.audit',
            'description' => '通过用户'
        ]);

        /**
         * 禁用用户
         */
        Permission::create([
            'name' => 'users trash',
            'slug' => 'admin.users.trash',
            'description' => '禁用用户'
        ]);

        /**
         * 恢复用户
         */
        Permission::create([
            'name' => 'users undo',
            'slug' => 'admin.users.undo',
            'description' => '恢复用户'
        ]);

        /**
         * 查看用户信息
         */
        Permission::create([
            'name' => 'users show',
            'slug' => 'admin.users.show',
            'description' => '查看用户信息'
        ]);

        /**
         * 修改用户密码
         */
        Permission::create([
            'name' => 'users reset',
            'slug' => 'admin.users.reset',
            'description' => '修改用户密码'
        ]);
    }
}
