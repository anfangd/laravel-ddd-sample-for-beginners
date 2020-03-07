<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Infrastructure\InMemory\User;

use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserFactoryInterface;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;

/**
 * InMemoryUserFactory class
 *
 */
class InMemoryUserFactory implements UserFactoryInterface
{

    /** @var int */
    private $currentId;

    /**
     * Create New User.
     *
     * @param UserName $name
     * @return User
     */
    public function create(UserName $name): User
    {
        $this->currentId++;

        return new User(
            new UserId((string)$this->currentId),
            $name
        );
    }
}
