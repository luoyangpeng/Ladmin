# IAdmin 后台安装指南

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

- 其他命令可以直接在项目根目录下执行`php artisan`,可以得到关于`artisan`的所有命令
- 
![](http://o6hc01bvr.bkt.clouddn.com/20160911062751.png)
