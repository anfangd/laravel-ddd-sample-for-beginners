<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\Circle\Update;

/**
 * CircleUpdateService Interface
 */
interface CircleUpdateServiceInterface
{
    /**
     * Update Circle.
     *
     * @param CircleUpdateCommand $command
     * @return void
     */
    public function handle(CircleUpdateCommand $command): void;
}
