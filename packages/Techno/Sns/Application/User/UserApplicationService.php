<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\User;

use Exception;
use packages\Techno\Sns\Domain\Exceptions\CanNotRegisterCircleException;
use packages\Techno\Sns\Domain\User\IUserRepository;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\Service\UserService;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\UseCase\User\Delete\UserDeleteCommand;
use packages\Techno\Sns\UseCase\User\GetInfo\UserData;
use packages\Techno\Sns\UseCase\User\Update\UserUpdateCommand;

/**
 * UserApplicationService class
 */
class UserApplicationService
{
    /** @var IUserRepository */
    private $userRepository;
    /** @var UserService */
    private $userService;

    /**
     * UserApplicationService constructer
     *
     * @param IUserRepository $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    /**
     * Create User.
     *
     * @param string $userId
     * @param string $userName
     * @return void
     */
    public function register(string $userId, string $userName):void
    {
        $user = new User(
            new UserId($userId),
            new UserName($userName)
        );

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterCircleException($user, "既に存在しています");
        }

        $this->userRepository->save($user);
    }

    /**
     * Get User Data.
     *
     * @param string $userId
     * @return UserData|null
     */
    public function get(string $userId)
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->findById($targetId);
        if (is_null($user)) {
            return null;
        }

        return new UserData($user);
    }

    /**
     * Update user data.
     *
     * @param UserUpdateCommand $command
     * @return void
     */
    public function update(UserUpdateCommand $command)
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);

        if (is_null($user)) {
            throw new CanNotRegisterCircleException($user, "既に存在しています");

        }

        $name = $command->name;
        if (is_null($name)) {
            $newUserName = new UserName($command->name);
            $user->changeUserName($newUserName);
        }
        
        $mailAddress = $command->mailAddress;
        if (is_null($mailAddress)) {
        }

        $this->userRepository->save($user);
    }

    /**
     * Delete User Data.
     *
     * @param UserDeleteCommand $command
     * @return void
     */
    public function delete(UserDeleteCommand $command)
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);

        if (is_null($user)) {
            return;
        }

        $this->userRepository->delete($user);
    }
}
