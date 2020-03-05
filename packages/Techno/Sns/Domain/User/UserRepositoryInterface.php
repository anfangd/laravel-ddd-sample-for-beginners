<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Techno\Sns\Domain\User;

/**
 * UserRepository interface
 * 
 */
interface UserRepositoryInterface
{
    public function save(User $user);
    public function findById(UserId $userId);
    public function findByName(UserName $userName);
    public function delete(User $user);
}
