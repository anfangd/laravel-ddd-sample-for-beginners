<?php
/**
 * Test of User
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\User;

use packages\Techno\Sns\Domain\Exceptions\ArgumentException;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use PHPUnit\Framework\TestCase;

/**
 * UserTest class
 *
 */
class UserTest extends TestCase
{
    /**
     * New Instance.
     *
     * @return void
     */
    public function testUserNewInstance()
    {
        $id = "testId";
        $name = "testName";
        $userId = new UserId($id);
        $userName = new UserName($name);
        $user = new User($userId, $userName);
        $this->assertSame($id, $user->getId()->getValue());
        $this->assertSame($name, $user->getName()->getValue());

        $equal = $user->equals($user);
        $this->assertTrue($equal);

        $newName = "newName";
        $user->changeUserName("newName");
        $this->assertSame($newName, $user->getName()->getValue());
    }

    public function testArgumentNull() {

        $id = "testId";
        $name = "testName";
        $userId = new UserId($id);
        $userName = new UserName($name);
        $user = new User($userId, $userName);

        $this->expectException(\Error::class);

        $name = null;
        $user->changeUserName($name);
    }

    public function testArgumentMimimumMinus1() {

        $id = "testId";
        $name = "testName";
        $userId = new UserId($id);
        $userName = new UserName($name);
        $user = new User($userId, $userName);

        $this->expectException(ArgumentException::class);

        $name = "ab";
        $user->changeUserName($name);
    }
}
