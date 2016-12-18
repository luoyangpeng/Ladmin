<p align="center">
    <a href="https://www.iyoulang.cc">
        <img width="144" src="https://www.iyoulang.cc/front/assets/img/logo.png">
    </a>
</p>


# LAdmin 安装指北（包含：后台、前台、API）

### 安装    
```
composer install
```

### 创建.env文件

```
cp .env.example .env
```

### .env 配置

#### 1.数据库配置
 ```
 	DB_HOST=localhost			//ip地址
 	DB_DATABASE=homestead		//数据库名称
 	DB_USERNAME=homestead		//数据库用户名
 	DB_PASSWORD=secret			//数据库密码
 ```

#### 2.域名配置

 ```
	ADMIN_DOMAIN = admin.test.com
	FRONT_DOMAIN = www.test.com
	API_DOMAIN =  api.test.com
 ```

### 配置好数据库后生产项目秘钥，在项目根目录运行下面命令：

 ```
 php artisan key:generate
 ```
### 迁移数据

```
php artisan migrate
```

### 填充基本数据
```
php artisan db:seed
```

> 后台访问 youdomain/admin

> 后台用户名密码 admin@admin.com 123456


![iView](http://o6hc01bvr.bkt.clouddn.com/20160921011158.png)

>后台权限部分使用的IAdmin

>后台模板仅供测试交流，如需使用商业用途，请官网授权。

> 使用本程序开发的网站 请在网页底部加入 Power by Ladmin ，链接指向 https://www.iyoulang.cc


#License
MIT