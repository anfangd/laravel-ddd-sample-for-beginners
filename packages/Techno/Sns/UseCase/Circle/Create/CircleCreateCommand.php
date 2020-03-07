<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\Circle\Create;

/**
 * CircleCreateCommand class
 */
class CircleCreateCommand
{
    /** @var string */
    public $fromUserId;
    /** @var string */
    public $invitedUserId;
    /** @var string */
    public $circleId;

    /**
     * CircleRegisterCommand construcer.
     *
     * @param string $fromUserId
     * @param string $invitedUserId
     * @param string $circleId
     */
    public function __construct(string $fromUserId, string $invitedUserId, string $circleId)
    {
        $this->fromUserId = $fromUserId;
        $this->invitedUserId = $invitedUserId;
        $this->circleId = $circleId;
    }
}
