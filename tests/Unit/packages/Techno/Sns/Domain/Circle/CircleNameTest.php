<?php
/**
 * Test of Circle Name Value Object
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\Circle;

use packages\Techno\Sns\Domain\Circle\CircleName;
use packages\Techno\Sns\Domain\Exceptions\ArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * CircleNameTest class
 *
 */
class CircleNameTest extends TestCase
{
    /**
     * Test Values.
     *
     * @return void
     */
    public function testGetValue()
    {
        $name = "testName";
        $CircleName = new CircleName($name);
        $this->assertSame($name, $CircleName->getValue());
    }

    /**
     * Test Exception.
     *
     * @return void
     */
    public function testGetValueNameNull()
    {
        $this->expectException(\Error::class);
        $name = null;
        new CircleName($name);
    }

    /**
     * Test Exception.
     *
     * @return void
     */
    public function testGetValueName2()
    {
        $this->expectException(ArgumentException::class);
        $name = "ab";
        new CircleName($name);
    }
}
