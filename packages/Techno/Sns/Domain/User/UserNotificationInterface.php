<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\User;

/**
 * UserNotification interface
 *
 */
interface UserNotificationInterface
{
    /**
     * Notify ID.
     *
     * @param UserId $id
     * @return void
     */
    public function id(UserId $id): void;

    /**
     * Notify Name.
     *
     * @param UserName $name
     * @return void
     */
    public function name(UserName $name): void;
}
