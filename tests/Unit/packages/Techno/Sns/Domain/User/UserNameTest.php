<?php
/**
 * Test of User Name Value Object
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\User;

use packages\Techno\Sns\Domain\Exceptions\ArgumentException;
use PHPUnit\Framework\TestCase;
use packages\Techno\Sns\Domain\User\UserName;

/**
 * UserNameTest class
 *
 */
class UserNameTest extends TestCase
{
    /**
     * Test Values.
     *
     * @return void
     */
    public function testMinLengthName()
    {
        $name = "123";
        $UserName = new UserName($name);
        $this->assertSame($name, $UserName->getValue());
    }

    /**
     * Test Exception.
     *
     * @return void
     */
    public function testNullName()
    {
        $this->expectException(\Error::class);
        $name = null;
        new UserName($name);
    }

    /**
     * Test Exception.
     *
     * @return void
     */
    public function testMinLengthNameMinus1()
    {
        $this->expectException(ArgumentException::class);
        $name = "ab";
        new UserName($name);
    }
}
