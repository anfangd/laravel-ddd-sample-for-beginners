<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Circle;

/**
 * CircleRepository interface
 *
 */
interface CircleRepositoryInterface
{
    public function save(Circle $circle);
    public function findById(CircleId $circleId);
    public function findByName(CircleName $circleName);
}
