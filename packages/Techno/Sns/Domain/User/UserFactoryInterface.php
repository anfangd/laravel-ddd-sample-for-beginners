<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\User;

/**
 * UserFactoryInterface
 */
interface UserFactoryInterface
{
    /**
     * Create New User.
     *
     * @param UserName $name
     * @return User
     */
    public function create(UserName $name): User;
}
