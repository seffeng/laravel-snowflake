# Laravel Snowflake

### 安装

```shell
# 安装
$ composer require seffeng/laravel-snowflake
```

##### Laravel

```php
# 1、生成配置文件
$ php artisan vendor:publish --tag="snowflake"

# 2、修改配置文件 /config/snowflake.php，或 .env
```

##### lumen

```php
# 1、复制扩展内配置文件 /config/snowflake.php 到项目配置目录 /config

# 2、修改配置文件 /config/snowflake.php，或 .env

# 3、将以下代码段添加到 /bootstrap/app.php 文件中的 Providers 部分
$app->register(Seffeng\LaravelSnowflake\SnowflakeServiceProvider::class);

# 4、/bootstrap/app.php 添加配置加载代码
$app->configure('snowflake');
```

### 示例

```php
# 示例
use Seffeng\LaravelSnowflake\Facades\Snowflake;

class SiteController extends Controller
{
    public function test()
    {
        // 生成雪花ID
        var_dump(Snowflake::id());
    }
}
```

```php
# Model 示例
use Illuminate\Database\Eloquent\Model;
use Seffeng\LaravelSnowflake\Traits\SnowflakePrimary;

class User extends Model {
    // $model->save() 时自动使用雪花ID
    use SnowflakePrimary;
}
```



### 备注

1、测试脚本 tests/SnowflakeTest.php 仅作为示例供参考。