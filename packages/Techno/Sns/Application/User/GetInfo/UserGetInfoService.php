<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\User\GetInfo;

use Exception;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\UseCase\User\GetInfo\UserData;
use packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoCommand;
use packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoServiceInterface;

/**
 * UserGetInfoService class
 */
class UserGetInfoService implements UserGetInfoServiceInterface
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
     * @param UserGetInfoCommand $command
     * @return UserData|null
     */
    public function handle(UserGetInfoCommand $command)
    {
        $targetName = new UserName($command->name);
        $user = $this->userRepository->findByName($targetName);
        if (is_null($user)) {
            return null;
        }

        return new UserData($user);
    }
}
