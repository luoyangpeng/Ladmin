# LAdmin 后台安装指北

- 初始化项目,进入项目根目录,执行`composer install`安装依赖

- 上面依赖包安装完成之后初始化项目
 复制项目根目录下的 `.env.example` 文件命名为 `.env` 文件,配置数据库
 ```php
 DB_HOST=localhost			//ip地址
 DB_DATABASE=homestead		//数据库名称
 DB_USERNAME=homestead		//数据库用户名
 DB_PASSWORD=secret			//数据库密码
 ```

 配置好数据库后生产项目秘钥，在项目根目录运行下面命令：

 ```php
 php artisan key:generate
 ```
- 迁移数据
```php
php artisan migrate
```

- 填充基本数据
```php
php artisan db:seed
```

> 后台用户名密码 admin@admin.com 123456


![](http://o6hc01bvr.bkt.clouddn.com/20160911062751.png)

>由开源项目IAdmin 扩展
>后台模板仅供测试交流，如需使用商业用途，请官网授权。


#License
MIT