<?php  declare(strict_types=1);

namespace Seffeng\LaravelSnowflake\Tests;

use PHPUnit\Framework\TestCase;
use Seffeng\LaravelSnowflake\Facades\Snowflake;

class SnowflakeTest extends TestCase
{
    public function testSnowflake()
    {
        var_dump(Snowflake::id());
    }
}
