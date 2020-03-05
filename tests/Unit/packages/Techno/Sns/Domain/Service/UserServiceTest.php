<?php
/**
 * Test of UserService.
 */
namespace Tests\Unit\packages\Techno\Sns\Domain\Service;

use packages\Techno\Sns\Domain\Service\UserService;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Infrastructure\Eloquent\User\UserRepository;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

/**
 * UserServiceTest class
 * 
 */
class UserServiceTest extends TestCase
{
    /**
     * Test type of Return Value.
     *
     * @return void
     */
    public function testExists()
    {
        $user = new User(
            new UserId("id001"),
            new UserName("name001")
        );

        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        $this->assertIsBool($userService->exists($user));
    }
}
