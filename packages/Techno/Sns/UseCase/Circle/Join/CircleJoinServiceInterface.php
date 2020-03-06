<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\Circle\Join;

/**
 * CircleJoinService Interface
 */
interface CircleJoinServiceInterface
{
    /**
     * Join Circle.
     *
     * @param CircleJoinCommand $command
     * @return void
     */
    public function handle(CircleJoinCommand $command):void;
}
