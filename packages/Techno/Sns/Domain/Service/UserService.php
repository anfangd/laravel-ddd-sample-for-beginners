<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Techno\Sns\Domain\Service;

use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;

/**
 * UserService class
 *
 */
class UserService
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * UserService constructer.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Check existence of User.
     *
     * @param User $user
     * @return boolean
     */
    public function exists(User $user): bool
    {
        $found = $this->userRepository->findByName($user->getName());

        return $found != null;
    }
}
