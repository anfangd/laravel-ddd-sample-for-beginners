<?php
/**
 * Test of CircleService.
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\Service;

use Illuminate\Support\Collection;
use packages\Techno\Sns\Infrastructure\QueryBuilder\Circle\CircleRepository;
use packages\Techno\Sns\Domain\Service\CircleService;
use packages\Techno\Sns\Domain\Circle\Circle;
use packages\Techno\Sns\Domain\Circle\CircleId;
use packages\Techno\Sns\Domain\Circle\CircleName;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

/**
 * CircleServiceTest class
 */
class CircleServiceTest extends TestCase
{
    /**
     * Test type of Return Value.
     *
     * @return void
     */
    public function testExists()
    {
        $circle = new Circle(
            new CircleId("id001"),
            new CircleName("name001"),
            new User(
                new UserId("uId001"),
                new UserName("uName001")
            ),
            new Collection()
        );

        $circleRepository = new CircleRepository;
        $circleService = new CircleService($circleRepository);
        $this->assertIsBool($circleService->exists($circle));
    }
}
