<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\Circle\Create;

/**
 * CircleCreateService Interface
 */
interface CircleCreateServiceInterface
{
    /**
     * Create Circle.
     *
     * @param CircleCreateCommand $command
     * @return void
     */
    public function handle(CircleCreateCommand $command):void;

}