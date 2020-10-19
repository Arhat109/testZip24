<?php

// start composer autoload:
$dir = dirname(__DIR__);
require_once $dir.'/vendor/autoload.php';

require $dir.'/zip24/testZip24.php';

use PHPUnit\Framework\TestCase;

class TestZip24Tests extends TestCase
{
    public function addDataProvider()
    {
        return [
            [-123, -321],
            [TestZip24::INT_MIN, 0],
            [TestZip24::INT_MAX, 0],
            [0, 0],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testIntRevert1($num, $exp)
    {
        $this->assertEquals($exp
            , TestZip24::intRevert1($num)
        );
    }
}