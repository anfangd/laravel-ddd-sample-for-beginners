<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Techno\Sns\Domain\Service;

use packages\Techno\Sns\Domain\User\User;

/**
 * UserService class
 *
 */
class UserService
{

    /**
     * Check existence of User.
     *
     * @param User $user
     * @return boolean
     */
    public function exists(User $user): bool
    {
        // 重複を確認する処理
        return false;
    }
}
