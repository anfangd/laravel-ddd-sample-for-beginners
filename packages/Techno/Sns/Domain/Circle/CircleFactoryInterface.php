<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Circle;

use packages\Techno\Sns\Domain\User\User;

/**
 * CircleFactoryInterface
 */
interface CircleFactoryInterface
{
    /**
     * Create New UCircleser.
     *
     * @param CircleName $name
     * @param User $owner
     * @return Circle
     */
    public function create(CircleName $name, User $owner): Circle;
}
