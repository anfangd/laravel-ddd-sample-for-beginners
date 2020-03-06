<?php
/**
 * Test of Circle ID Value Object
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\Circle;

use packages\Techno\Sns\Domain\Circle\CircleId;
use PHPUnit\Framework\TestCase;

/**
 * CircleIdTest class
 *
 */
class CircleIdTest extends TestCase
{
    /**
     * Test Values.
     *
     * @return void
     */
    public function testGetValue()
    {
        $name = "testName";
        $circleIdValueObject = new CircleId($name);
        $this->assertSame($name, $circleIdValueObject->getValue());
    }

    /**
     * Test values by null.
     *
     * @return void
     */
    public function testGetValueNameNull()
    {
        $this->expectException(\Error::class);
        $id = null;
        new CircleId($id);
    }
}
