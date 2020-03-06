<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\User\Register;

/**
 * UserRegisterService Interface
 */
interface UserRegisterServiceInterface
{
    /**
     * Create User.
     *
     * @param string $userId
     * @param string $userName
     * @return void
     */
    public function handle(UserRegisterCommand $command):void;
}
