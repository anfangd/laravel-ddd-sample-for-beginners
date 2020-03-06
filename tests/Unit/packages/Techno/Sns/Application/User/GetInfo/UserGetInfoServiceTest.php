<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace Tests\Unit\packages\Techno\Sns\Application\User\GetInfo;

use packages\Techno\Sns\Application\User\GetInfo\UserGetInfoService;
use packages\Techno\Sns\Infrastructure\QueryBuilder\User\UserRepository;
use packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoCommand;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Ulid\Ulid;
use Faker\Factory as Faker;

/**
 * UserGetInfoServiceTest class
 */
class UserGetInfoServiceTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    /**
     * Test get user information.
     *
     * @return void
     */
    public function testGetInfo()
    {
        $userRepository = new UserRepository();
        $userGetInfoService = new UserGetInfoService($userRepository);
        $userData = $userGetInfoService->handle(new UserGetInfoCommand(Ulid::generate()->__toString()));

        $this->assertTrue(true);
    }
}
