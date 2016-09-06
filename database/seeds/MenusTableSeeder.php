<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = new Menu;
        $index->name = "控制台";
        $index->pid = 0;
        $index->language = "zh";
        $index->icon = "fa fa-dashboard";
        $index->slug = "admin.systems.index";
        $index->url = "admin";
        $index->description = "后台首页";
        $index->save();

        $system = new Menu;
        $system->name = "系统管理";
        $system->pid = 0;
        $system->language = "zh";
        $system->icon = "fa fa-cog";
        $system->slug = "admin.systems.manage";
        $system->url = "admin/role*,admin/permission*,admin/user*,admin/menu*,admin/log-viewer*";
        $system->description = "系统功能管理";
        $system->save();

        $user = new Menu;
        $user->name = "用户管理";
        $user->pid = $system->id;
        $user->language = "zh";
        $user->icon = "fa fa-users";
        $user->slug = "admin.users.list";
        $user->url = "admin/user";
        $user->description = "显示用户管理";
        $user->save();


        $role = new Menu;
        $role->name = "角色管理";
        $role->pid = $system->id;
        $role->language = "zh";
        $role->icon = "fa fa-male";
        $role->slug = "admin.roles.list";
        $role->url = "admin/role";
        $role->description = "显示角色管理";
        $role->save();


        $permission = new Menu;
        $permission->name = "权限管理";
        $permission->pid = $system->id;
        $permission->language = "zh";
        $permission->icon = "fa fa-paper-plane";
        $permission->slug = "admin.permissions.list";
        $permission->url = "admin/permission";
        $permission->description = "显示权限管理";
        $permission->save();

        $log = new Menu;
        $log->name = "系统日志";
        $log->pid = $system->id;
        $log->language = "zh";
        $log->icon = "fa fa-file-text-o";
        $log->slug = "admin.logs.all";
        $log->url = "admin/log-viewer";
        $log->description = "显示系统日志";
        $log->save();

        $menu = new Menu;
        $menu->name = "菜单管理";
        $menu->pid = $system->id;
        $menu->language = "zh";
        $menu->icon = "fa fa-navicon";
        $menu->slug = "admin.menus.list";
        $menu->url = "admin/menu";
        $menu->description = "显示菜单管理";
        $menu->save();

    }
}
