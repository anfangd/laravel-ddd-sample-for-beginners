<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\Circle\Join;

/**
 * CircleRegisterCommand class
 */
class CircleJoinCommand
{
    /** @var string */
    public $userId;
    /** @var string */
    public $circleId;

    /**
     * CircleRegisterCommand construcer.
     *
     * @param string $userId
     * @param string $circleId
     */
    public function __construct(string $userId, string $circleId=null)
    {
        $this->userId = $userId;
        $this->circleId = $circleId;
    }
}
