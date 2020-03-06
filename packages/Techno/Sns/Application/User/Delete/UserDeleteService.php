<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\User\Delete;

use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\UseCase\User\Delete\UserDeleteCommand;
use packages\Techno\Sns\UseCase\User\Delete\UserDeleteServiceInterface;

/**
 * UserDeleteService class
 */
class UserDeleteService implements UserDeleteServiceInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * UserDeleteService constructer
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Delete User Data.
     *
     * @param UserDeleteCommand $command
     * @return void
     */
    public function handle(UserDeleteCommand $command)
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);

        if (is_null($user)) {
            return;
        }

        $this->userRepository->delete($user);
    }
}
