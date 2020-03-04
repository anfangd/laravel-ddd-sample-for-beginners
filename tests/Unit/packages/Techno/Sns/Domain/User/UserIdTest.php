<?php
/**
 * Test of User ID Value Object
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\User;

use packages\Techno\Sns\Domain\Exceptions\ArgumentNullException;
use packages\Techno\Sns\Domain\User\UserId;
use PHPUnit\Framework\TestCase;

/**
 * UserIdTest class
 *
 */
class UserIdTest extends TestCase
{
    /**
     * Test Values.
     *
     * @return void
     */
    public function testGetValue()
    {
        $name = "testName";
        $userId = new UserId($name);
        $this->assertSame($name, $userId->getValue());
    }

    /**
     * Test values by null.
     * 
     * @test
     *
     * @return void
     */
    public function testGetValueNameNull()
    {
        $this->expectException(\Error::class);

        $id = null;
        new UserId($id);
    }
}
