<?php
/**
 * Test of Circle ID Value Object
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\Circle;

use Illuminate\Support\Collection;
use packages\Techno\Sns\Domain\Circle\Circle;
use packages\Techno\Sns\Domain\Circle\CircleFullSpecification;
use packages\Techno\Sns\Domain\Circle\CircleId;
use packages\Techno\Sns\Domain\Circle\CircleName;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Infrastructure\QueryBuilder\User\UserRepository;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;


/**
 * CircleIdTest class
 *
 */
class CircleFullSpecificationTest extends TestCase
{

    public function testIsSatisfiedBy()
    {
        $userRepository = new UserRepository;
        $circleFullSpecification = new CircleFullSpecification($userRepository);

        $circle = new Circle(
            new CircleId("circleID"),
            new CircleName("circleName"),
            new User(
                new UserId("userId"),
                new UserName("userName")
            ),
            new Collection(["userId001", "userId002", "userId003"])
        );
        $circleFullSpecification->isSatisfiedBy($circle);

        $this->assertTrue(true);
    }
}
