<?php

// start composer autoload:
$dir = dirname(__DIR__);
require_once $dir.'/vendor/autoload.php';

require $dir.'/zip24/testZip24.php';

use PHPUnit\Framework\TestCase;

class TestZip24Tests extends TestCase
{
    private $calculator;

    public function testIntRevert1()
    {
        $this->assertEquals(-321, TestZip24::intRevert1(-123));
    }
}