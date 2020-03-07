<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\User\Delete;

/**
 * UserDeleteService Interface.
 */
interface UserDeleteServiceInterface
{
    /**
     * Delete User Data.
     *
     * @param UserDeleteCommand $command
     * @return void
     */
    public function handle(UserDeleteCommand $command);
}
