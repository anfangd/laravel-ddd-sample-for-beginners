<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\User\Register;

use packages\Techno\Sns\Domain\Exceptions\CanNotRegisterUserException;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\Service\UserService;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\UseCase\User\Register\UserRegisterCommand;
use packages\Techno\Sns\UseCase\User\Register\UserRegisterServiceInterface;

/**
 * UserRegisterService class
 */
class UserRegisterService implements UserRegisterServiceInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;
    /** @var UserService */
    private $userService;

    /**
     * UserApplicationService constructer
     *
     * @param UserRepositoryInterface $userRepository
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
    public function handle(UserRegisterCommand $command):void
    {
        $user = new User(
            new UserId($command->id),
            new UserName($command->name)
        );

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user, "既に存在しています");
        }

        $this->userRepository->save($user);
    }
}
