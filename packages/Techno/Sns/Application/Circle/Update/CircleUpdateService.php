<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\Circle\Update;

use Exception;
use packages\Techno\Sns\Domain\Service\CircleService;
use packages\Techno\Sns\Domain\Circle\ICircleRepository;
use packages\Techno\Sns\Domain\Circle\CircleFactoryInterface;
use packages\Techno\Sns\Domain\Circle\CircleId;
use packages\Techno\Sns\Domain\Circle\CircleRepositoryInterface;
use packages\Techno\Sns\UseCase\Circle\Update\CircleUpdateCommand;
use packages\Techno\Sns\UseCase\Circle\Update\CircleUpdateServiceInterface;

// Annotation
use Ytake\LaravelAspect\Annotation\Transactional;

/**
 * CircleUpdateService class
 */
class CircleUpdateService implements CircleUpdateServiceInterface
{
    /** @var CircleFactoryInterface */
    private $circleFactory;
    /** @var ICircleRepository */
    private $circleRepository;
    /** @var CircleService */
    private $circleService;

    /**
     * CircleApplicationService constructer
     *
     * @param CircleFactoryInterface $circleFactory
     * @param CircleRepositoryInterface $circleRepository
     * @param CircleService $circleService
     */
    public function __construct(
        CircleFactoryInterface $circleFactory,
        CircleRepositoryInterface $circleRepository,
        CircleService $circleService
    ) {
        $this->circleFactory = $circleFactory;
        $this->circleRepository = $circleRepository;
        $this->circleService = $circleService;
    }

    /**
     * Update Circle.
     *
     * @Transactional("mysql")
     *
     * @param CircleUpdateCommand $command
     * @return void
     */
    public function handle(CircleUpdateCommand $command):void
    {
        $id = new CircleId($command->circleId);
        $circle = $this->circleRepository->findById($id);
        if (is_null(($circle))) {
            throw new Exception();
        }

        //TODO: ユーザ名の重複を確認する.

        $this->circleRepository->save($circle);
    }
}
