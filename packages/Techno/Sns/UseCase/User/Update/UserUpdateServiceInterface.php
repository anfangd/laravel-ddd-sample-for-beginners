<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\User\Update;

/**
 * UserUpdateService interface
 */
interface UserUpdateServiceInterface
{

    /**
     * Update user data.
     *
     * @param UserUpdateCommand $command
     * @return void
     */
    public function handle(UserUpdateCommand $command);
}
