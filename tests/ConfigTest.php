<?php

declare(strict_types=1);

use App\Core\Conf;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    function testDefaultController()
    {
        $this->assertIsString(Conf::DEFAULT_CONTROLLER, 'Is not string');

        $this->assertEquals('Site', Conf::DEFAULT_CONTROLLER, 'Not correct default controller');
    }

}