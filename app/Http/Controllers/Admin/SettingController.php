<?php
/**
 * 网站功能设置
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller {

    /**
     * 功能开关
     */
    public function webSwitch()
    {

        return view("admin.setting.switch");
    }

    /**
     * 邮件模板
     */
    public function emailTemple()
    {
        return view("admin.setting.email");
    }
}