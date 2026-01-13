<?php

/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2026 seffeng
 */
namespace Seffeng\LaravelSnowflake;


use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Seffeng\LaravelSnowflake\Exceptions\SnowflakeException;


class SnowflakeServiceProvider extends BaseServiceProvider
{
    /**
     *
     * {@inheritDoc}
     * @see \Illuminate\Support\ServiceProvider::register()
     */
    public function register()
    {
        $this->registerAliases();
        $this->mergeConfigFrom($this->configPath(), 'snowflake');

        $this->app->singleton('seffeng.laravel.snowflake', function ($app) {
            $config = $app['config']->get('snowflake');

            if ($config && is_array($config)) {
                return new Snowflake($config);
            } else {
                throw new SnowflakeException('Please execute the command `php artisan vendor:publish --provider="Seffeng\LaravelSnowflake\SnowflakeServiceProvider"` first to  generate snowflake configuration file.');
            }
        });
    }

    /**
     *
     * @author zxf
     * @date    2020年4月17日
     */
    public function boot()
    {
        if ($this->app->runningInConsole() && $this->app instanceof LaravelApplication) {
            $this->publishes([$this->configPath() => config_path('snowflake.php')], 'snowflake');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('snowflake');
        }
    }

    /**
     *
     * @author zxf
     * @date    2020年4月18日
     */
    protected function registerAliases()
    {
        $this->app->alias('seffeng.laravel.snowflake', Snowflake::class);
    }

    /**
     *
     * @author zxf
     * @date    2020年4月17日
     * @return string
     */
    protected function configPath()
    {
        return dirname(__DIR__) . '/config/snowflake.php';
    }
}