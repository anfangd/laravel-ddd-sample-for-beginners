<?php
/**
 * Test of Circle
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\Circle;

use Illuminate\Support\Collection;
use packages\Techno\Sns\Domain\Circle\Circle;
use packages\Techno\Sns\Domain\Circle\CircleId;
use packages\Techno\Sns\Domain\Circle\CircleName;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use PHPUnit\Framework\TestCase;

/**
 * CircleTest class
 *
 */
class CircleTest extends TestCase
{
    /**
     * New Instance.
     *
     * @return void
     */
    public function testCircleNewInstance()
    {
        $id = "testId";
        $name = "testName";
        $circleId = new CircleId($id);
        $circleName = new CircleName($name);
        $user = new User(
            new UserId("uId001"),
            new UserName("uName001")
        );
        $members = new Collection();
        $circle = new Circle($circleId, $circleName, $user, $members);
        $this->assertSame($id, $circle->getId()->getValue());
        $this->assertSame($name, $circle->getName()->getValue());

        $this->expectException(\Error::class);

        $name = null;
        $circle->changeCircleName($name);
        $name = "ab";
        $circle->changeCircleName($name);
    }
}
