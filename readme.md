<p align="center">
    <a href="https://www.iyoulang.cc">
        <img width="144" src="https://www.iyoulang.cc/front/assets/img/logo.png">
    </a>
</p>


# LAdmin 安装指北

## 系统要求
* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## 安装    
```shell
composer install
```

## 创建.env文件

```shell
cp .env.example .env
```

## .env 配置

### 1.数据库配置

 ```php
 	DB_HOST=localhost			//ip地址
 	DB_DATABASE=root			//数据库名称
 	DB_USERNAME=root			//数据库用户名
 	DB_PASSWORD=secret			//数据库密码
 ```

### 2.域名配置

 ```php
	ADMIN_DOMAIN = admin.test.com
	FRONT_DOMAIN = www.test.com
	API_DOMAIN   = api.test.com
	LOGIN_DOMAIN = account.test.com 
 ```

## 配置好数据库后生产项目秘钥，在项目根目录运行下面命令：

 ```shell
 php artisan key:generate
 ```
## 迁移数据

```shell
php artisan migrate
```

## 填充基本数据

```shell
php artisan db:seed
```
## 项目访问

* 前台访问 www.test.com
* api访问  api.test.com
* 后台访问 admin.test.com/admin
* 后台用户名密码 admin@admin.com 123456

<img src="http://o6hc01bvr.bkt.clouddn.com/20161022101315.png" style="max-width: 100%" />

## 扩展包描述

| 扩展包 | 一句话描述 | 在本项目中的使用案例 |  
| --- | --- | --- |   
| [barryvdh/laravel-debugbar] | 调试工具栏 | 开发时必备调试工具。 |
|[rap2hpoutre/laravel-logviewer]| Log 查看工具 | 生产环境下，使用此扩展包快速查看 Log |
| [Intervention/image]| 图片处理功能库 | 用发帖和回复帖子时，图片上传的逻辑使用了此扩展包。 |
| [bican/roles] | 用户组权限系统 | 整站的权限系统基于此扩展包开发。 |
| [mews/captcha] | 验证码 | 后台登录验证码基于此扩展包开发。 |
| [jlapp/swaggervel] | API控制台 | API管理基于此扩展包开发。 |
| [overtrue/laravel-wechat] | 微信管理 | 微信支付，微信创建菜单，聊天授权登录管理基于此扩展包开发。 |


## License

> 使用 EasyLms 构建，或者基于 EasyLms 源代码修改的站点 **必须** 在页脚加上 `Powered by EasyLms` 字样，并且必须链接到 `https://iyoulang.cc` 上。**必须** 在页面的每一个标题上加上 `Powered by EasyLms` 字样。

在遵守以上规则的情况下，你可以享受等同于 MIT 协议的授权。
