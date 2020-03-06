<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace Tests\Unit\packages\Techno\Sns\Application\User\Delete;

use packages\Techno\Sns\Application\User\Delete\UserDeleteService;
use packages\Techno\Sns\Infrastructure\QueryBuilder\User\UserRepository;
use packages\Techno\Sns\UseCase\User\Delete\UserDeleteCommand;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Ulid\Ulid;
use Faker\Factory as Faker;

/**
 * UserDeleteServiceTest class
 */
class UserDeleteServiceTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    /**
     * Test delete User.
     *
     * @return void
     */
    public function testDeleteUser()
    {
        $userRepository = new UserRepository();
        $userDeleteService = new UserDeleteService($userRepository);
        $userDeleteService->handle(
            new UserDeleteCommand(Ulid::generate()->__toString(), $this->faker->name())
        );
        $this->assertTrue(true);
    }
}
