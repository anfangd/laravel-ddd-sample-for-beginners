<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\Circle\Create;

use Exception;
use packages\Techno\Sns\Domain\Service\CircleService;
use packages\Techno\Sns\Domain\Circle\CircleFactoryInterface;
use packages\Techno\Sns\Domain\Circle\CircleName;
use packages\Techno\Sns\Domain\Circle\CircleRepositoryInterface;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;

use packages\Techno\Sns\UseCase\Circle\Create\CircleCreateCommand;
use packages\Techno\Sns\UseCase\Circle\Create\CircleCreateServiceInterface;

use packages\Techno\Sns\Domain\Exceptions\CanNotRegisterCircleException;
use packages\Techno\Sns\Domain\Exceptions\UserNotFoundException;

// Annotation
use Ytake\LaravelAspect\Annotation\Transactional;

/**
 * CircleCreateService class
 */
class CircleCreateService implements CircleCreateServiceInterface
{
    /** @var CircleFactoryInterface */
    private $circleFactory;
    /** @var CircleRepositoryInterface */
    private $circleRepository;
    /** @var CircleService */
    private $circleService;
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * CircleApplicationService constructer
     *
     * @param CircleFactoryInterface $circleFactory
     * @param CircleRepositoryInterface $circleRepository
     * @param CircleService $circleService
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        CircleFactoryInterface $circleFactory,
        CircleRepositoryInterface $circleRepository,
        CircleService $circleService,
        UserRepositoryInterface $userRepository
    ) {
        $this->circleFactory = $circleFactory;
        $this->circleRepository = $circleRepository;
        $this->circleService = $circleService;
        $this->userRepository = $userRepository;
    }

    /**
     * Create Circle.
     *
     * @Transactional("mysql")
     *
     * @param CircleCreateCommand $command
     * @return void
     */
    public function handle(CircleCreateCommand $command):void
    {
        $ownerId = new UserId($command->userId);
        $owner = $this->userRepository->findById($ownerId);
        if (is_null($owner)) {
            throw new UserNotFoundException("サークルのオーナとなるユーザが見つかりませんでした。");
        }

        $circleName = new CircleName($command->name);
        $circle = $this->circleFactory->create($circleName, $owner);

        if ($this->circleService->exists($circle)) {
            throw new CanNotRegisterCircleException($command->name, "既に存在しています");
        }

        $this->circleRepository->save($circle);
    }
}
