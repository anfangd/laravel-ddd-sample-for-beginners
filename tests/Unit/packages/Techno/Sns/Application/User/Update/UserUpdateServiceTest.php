<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace Tests\Unit\packages\Techno\Sns\Application\User\Update;

use packages\Techno\Sns\Application\User\Update\UserUpdateService;
use packages\Techno\Sns\Domain\Exceptions\CanNotRegisterUserException;
use packages\Techno\Sns\Infrastructure\QueryBuilder\User\UserRepository;
use packages\Techno\Sns\UseCase\User\Update\UserUpdateCommand;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Ulid\Ulid;
use Faker\Factory as Faker;
use packages\Techno\Sns\Application\User\Register\UserRegisterService;
use packages\Techno\Sns\Domain\Service\UserService;
use packages\Techno\Sns\UseCase\User\Register\UserRegisterCommand;

/**
 * UserUpdateServiceTest class
 */
class UserUpdateServiceTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    public function testUpdateUser()
    {
        $id = (Ulid::generate()->__toString());

        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);

        $userRegisterService = new UserRegisterService($userRepository, $userService);
        $userRegisterService->handle(
            new UserRegisterCommand($id, $this->faker->name())
        );

        $userUpdateService = new UserUpdateService($userRepository);
        $userUpdateService->handle(
            new UserUpdateCommand($id, $this->faker->name())
        );
        $this->assertTrue(true);
    }
}
