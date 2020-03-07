<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\User\GetInfo;

/**
 * UserGetInfoService interface
 */
interface UserGetInfoServiceInterface
{

    /**
     * Get User Data.
     *
     * @param string $userId
     * @return UserData|null
     */
    public function handle(UserGetInfoCommand $command);
}
