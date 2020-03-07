<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Service;

use packages\Techno\Sns\Domain\Circle\CircleRepositoryInterface;
use packages\Techno\Sns\Domain\Circle\Circle;

/**
 * CircleService class
 *
 */
class CircleService
{
    /** @var CircleRepositoryInterface */
    private $circleRepository;

    /**
     * CircleService constructer.
     *
     * @param CircleRepositoryInterface $circleRepository
     */
    public function __construct(CircleRepositoryInterface $circleRepository)
    {
        $this->circleRepository = $circleRepository;
    }

    /**
     * Check existence of Circle.
     *
     * @param Circle $circle
     * @return boolean
     */
    public function exists(Circle $circle): bool
    {
        //TODO: 重複を確認する処理.
        $duplicated = $this->circleRepository->findById($circle->getId());

        return $duplicated != null;
    }
}
