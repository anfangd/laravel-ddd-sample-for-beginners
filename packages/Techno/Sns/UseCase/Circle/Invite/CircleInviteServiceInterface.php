<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\Circle\Invite;

/**
 * CircleInviteService Interface
 */
interface CircleInviteServiceInterface
{
    /**
     * Invite Circle.
     *
     * @param CircleInviteCommand $command
     * @return void
     */
    public function handle(CircleInviteCommand $command):void;
}
