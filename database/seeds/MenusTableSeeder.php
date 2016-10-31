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

        $menu = new Menu;
        $menu->name = "操作日志";
        $menu->pid = $system->id;
        $menu->language = "zh";
        $menu->icon = "fa fa-heart";
        $menu->slug = "admin.actionlog.list";
        $menu->url = "admin/actionlog";
        $menu->description = "操作日志";
        $menu->save();

        $image = new Menu;
        $image->name = "图片管理";
        $image->pid = 0;
        $image->language = "zh";
        $image->icon = "fa fa-heart";
        $image->slug = "admin.image.manage";
        $image->url = "admin/image/show*,admin/image/select*,admin/image/image_list*";
        $image->description = "图片管理";
        $image->save();

        $imageUpload = new Menu;
        $imageUpload->name = "图片上传";
        $imageUpload->pid = $image->id;
        $imageUpload->language = "zh";
        $imageUpload->icon = "fa fa-cloud-upload";
        $imageUpload->slug = "admin.image.upload";
        $imageUpload->url = "admin/image/show";
        $imageUpload->description = "图片上传";
        $imageUpload->save();

        $imageSelect = new Menu;
        $imageSelect->name = "图片选择器";
        $imageSelect->pid = $image->id;
        $imageSelect->language = "zh";
        $imageSelect->icon = "fa fa-photo";
        $imageSelect->slug = "admin.image.select";
        $imageSelect->url = "admin/image/select";
        $imageSelect->description = "图片选择器";
        $imageSelect->save();

        $imageList = new Menu;
        $imageList->name = "图片列表";
        $imageList->pid = $image->id;
        $imageList->language = "zh";
        $imageList->icon = "fa fa-photo";
        $imageList->slug = "admin.image.imagelist";
        $imageList->url = "admin/image/image_list";
        $imageList->description = "图片列表";
        $imageList->save();

        $website = new Menu;
        $website->name = "网站设置";
        $website->pid = 0;
        $website->language = "zh";
        $website->icon = "fa fa-globe";
        $website->slug = "admin.setting.manage";
        $website->url = "admin/setting/switch*,admin/setting/email*";
        $website->description = "网站设置相关";
        $website->save();


        $websiteSwitch = new Menu;
        $websiteSwitch->name = "功能开关";
        $websiteSwitch->pid = $website->id;
        $websiteSwitch->language = "zh";
        $websiteSwitch->icon = "fa fa-power-off";
        $websiteSwitch->slug = "admin.setting.switch";
        $websiteSwitch->url = "admin/setting/switch";
        $websiteSwitch->description = "网站功能开关";
        $websiteSwitch->save();

        $websiteSwitch = new Menu;
        $websiteSwitch->name = "邮件模板";
        $websiteSwitch->pid = $website->id;
        $websiteSwitch->language = "zh";
        $websiteSwitch->icon = "fa fa-envelope-o";
        $websiteSwitch->slug = "admin.setting.email";
        $websiteSwitch->url = "admin/setting/email";
        $websiteSwitch->description = "邮件模板";
        $websiteSwitch->save();

        $article = new Menu;
        $article->name = "文章管理";
        $article->pid = 0;
        $article->language = "zh";
        $article->icon = "fa fa-heart";
        $article->slug = "admin.article.manage";
        $article->url = "admin/article*,admin/ae_category*";
        $article->description = "文章管理";
        $article->save();

        $articleList = new Menu;
        $articleList->name = "文章列表";
        $articleList->pid = $article->id;
        $articleList->language = "zh";
        $articleList->icon = "fa fa-heart";
        $articleList->slug = "admin.article.list";
        $articleList->url = "admin/article";
        $articleList->description = "文章列表";
        $articleList->save();

        $articleCategory = new Menu;
        $articleCategory->name = "分类列表";
        $articleCategory->pid = $article->id;
        $articleCategory->language = "zh";
        $articleCategory->icon = "fa fa-heart";
        $articleCategory->slug = "admin.article.categorylist";
        $articleCategory->url = "admin/ae_category";
        $articleCategory->description = "分类列表";
        $articleCategory->save();








    }
}
