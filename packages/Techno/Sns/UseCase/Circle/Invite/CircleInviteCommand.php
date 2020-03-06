<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\Circle\Invite;

/**
 * CircleInviteCommand class
 */
class CircleInviteCommand
{
    /** @var string */
    public $userId;
    /** @var string */
    public $name;

    /**
     * CircleRegisterCommand construcer.
     *
     * @param string $userId
     * @param string $name
     */
    public function __construct(string $userId, string $name=null)
    {
        $this->userId = $userId;
        $this->name = $name;
    }
}
