<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace Tests\Unit\packages\Techno\Sns\Application\User\Register;

use packages\Techno\Sns\Application\User\Register\UserRegisterService;
use packages\Techno\Sns\Domain\Service\UserService;
use packages\Techno\Sns\Infrastructure\QueryBuilder\User\UserRepository;
use packages\Techno\Sns\UseCase\User\Register\UserRegisterCommand;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Ulid\Ulid;
use Faker\Factory as Faker;

/**
 * UserRegisterServiceTest class
 */
class UserRegisterServiceTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    public function testRegister()
    {
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        $userRegisterService = new UserRegisterService($userRepository, $userService);
        $userRegisterService->handle(
            new UserRegisterCommand(Ulid::generate()->__toString(), $this->faker->name())
        );
        $this->assertTrue(true);
    }
}
