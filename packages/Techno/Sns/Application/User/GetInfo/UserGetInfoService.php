<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\User\GetInfo;

use Exception;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\UseCase\User\GetInfo\UserData;
use packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoCommand;

/**
 * UserGetInfoService class
 */
class UserGetInfoService
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * UserGetInfoService constructer
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get User Data.
     *
     * @param string $userId
     * @return UserData|null
     */
    public function handle(UserGetInfoCommand $command)
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);
        if (is_null($user)) {
            return null;
        }

        return new UserData($user);
    }
}
