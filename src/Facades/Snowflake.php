<?php

/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2026 seffeng
 */
namespace Seffeng\LaravelSnowflake\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @author zxf
 * @date   2026-01-13
 * @method static string id()
 * @method static array parseId(string $id, bool $transform = false)
 * @method static integer getCurrentMillisecond()
 * @method static \Seffeng\LaravelSnowflake\Snowflake setStartTimeStamp(int $millisecond)
 * @method static integer getStartTimeStamp()
 * @method static \Seffeng\LaravelSnowflake\Snowflake setSequenceResolver(\Closure|\Godruoyi\Snowflake\SequenceResolver $sequence)
 * @method static null|\Closure|\Godruoyi\Snowflake\SequenceResolver getSequenceResolver()
 * @method static \Godruoyi\Snowflake\SequenceResolver getDefaultSequenceResolver()
 *
 * @see \Seffeng\LaravelSnowflake\Snowflake
 */
class Snowflake extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'seffeng.laravel.snowflake';
    }
}