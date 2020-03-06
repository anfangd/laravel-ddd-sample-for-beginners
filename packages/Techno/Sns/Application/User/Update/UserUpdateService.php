<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\User\Update;

use Exception;
use packages\Techno\Sns\Domain\Exceptions\UserNotFoundException;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\UseCase\User\Update\UserUpdateCommand;
use packages\Techno\Sns\UseCase\User\Update\UserUpdateServiceInterface;

/**
 * UserUpdateService class
 */
class UserUpdateService implements UserUpdateServiceInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * UserUpdateService constructer
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Update user data.
     *
     * @param UserUpdateCommand $command
     * @return void
     */
    public function handle(UserUpdateCommand $command)
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);

        if (is_null($user)) {
            throw new UserNotFoundException($targetId);
        }

        $name = $user->getName()->getValue();
        if (is_null($name)) {
            $newUserName = new UserName($command->name);
            $user->changeUserName($newUserName);
        }

        $mailAddress = $command->mailAddress;
        if (is_null($mailAddress)) {
        }

        $this->userRepository->update($user);
    }
}
