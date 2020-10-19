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

    /**
     * has ERROR: Static method "intRevert2" cannot be invoked on mock object
     * because phpunit can't mocking or stubbing final,abstract and statuc methods!
     * its good..
     */
    public function testWithStub()
    {
        // Create a stub for the Calculator class.
        $mockZip = $this->getMockBuilder('TestZip24')->getMock();

        // Configure the stub.
        $mockZip->expects($this->any())
            ->method('intRevert2')
            ->will($this->returnValue(321));

        $this->assertEquals(321, $mockZip::intRevert2(100));
    }
}