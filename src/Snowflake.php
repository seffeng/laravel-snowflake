<?php

/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2026 seffeng
 */
namespace Seffeng\LaravelSnowflake;

use Seffeng\ArrHelper\Arr;
use Seffeng\LaravelSnowflake\Exceptions\SnowflakeException;

class Snowflake
{
    /**
     * @author zxf
     * @date   2026-01-13
     * @var integer
     */
    private $datacenterId;

    /**
     * @author zxf
     * @date   2026-01-13
     * @var integer
     */
    private $workerId;

    /**
     * @author zxf
     * @date   2026-01-13
     * @var integer
     */
    private $startTime;

    /**
     * @author zxf
     * @date   2026-01-13
     * @var    string
     */
    private $defaultStartTime = '2026-01-01 00:00:00';

    /**
     * @author zxf
     * @date   2026-01-13
     * @var \Godruoyi\Snowflake\Snowflake
     */
    private $snowflake;

    public function __construct(array $config)
    {
        $this->datacenterId = Arr::getValue($config, 'datacenterId', 1);
        $this->workerId = Arr::getValue($config, 'workerId', 1);
        $this->startTime = Arr::getValue($config, 'startTime', $this->defaultStartTime);
        $this->snowflake = new \Godruoyi\Snowflake\Snowflake($this->datacenterId, $this->workerId);
        $this->getSnowflake()->setStartTimeStamp(strtotime($this->startTime) * 1000);
    }

    /**
     *
     * @author zxf
     * @date   2026-01-13
     * @return \Godruoyi\Snowflake\Snowflake
     */
    private function getSnowflake()
    {
        return $this->snowflake;
    }

    /**
     *
     * @author zxf
     * @date   2026-01-13
     * @param  mixed $method
     * @param  mixed $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists($this->getSnowflake(), $method)) {
            return $this->getSnowflake()->{$method}(...$parameters);
        } else {
            throw new SnowflakeException('方法｛' . $method . '｝不存在！');
        }
    }
}