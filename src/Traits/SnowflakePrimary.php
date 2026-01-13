<?php

/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2026 seffeng
 */
namespace Seffeng\LaravelSnowflake\Traits;

use Seffeng\LaravelSnowflake\Facades\Snowflake;

Trait SnowflakePrimary
{
    /**
     *
     * @author zxf
     * @date   2026-01-13
     * @return void
     */
    public static function bootSnowflakePrimary()
    {
        static::saving(function($model) {
            if (is_null($model->getKey())) {
                $keyName = $model->getKeyName();
                $id      = Snowflake::id();
                $model->setAttribute($keyName, $id);
            }
        });
    }
}