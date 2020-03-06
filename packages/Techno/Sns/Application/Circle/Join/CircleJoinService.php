<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\Circle\Join;

use Exception;
use packages\Techno\Sns\Domain\Service\CircleService;
use packages\Techno\Sns\Domain\Circle\ICircleRepository;
use packages\Techno\Sns\Domain\Circle\CircleFactoryInterface;
use packages\Techno\Sns\Domain\Circle\CircleId;
use packages\Techno\Sns\Domain\Circle\CircleRepositoryInterface;
use packages\Techno\Sns\Domain\Exceptions\CircleFullException;
use packages\Techno\Sns\Domain\Exceptions\CircleNotFoundException;
use packages\Techno\Sns\Domain\Exceptions\UserNotFoundException;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\UseCase\Circle\Join\CircleJoinCommand;
use packages\Techno\Sns\UseCase\Circle\Join\CircleJoinServiceInterface;

// Annotation
use Ytake\LaravelAspect\Annotation\Transactional;

/**
 * CircleJoinService class
 */
class CircleJoinService implements CircleJoinServiceInterface
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
     * @param ICircleRepository $circleRepository
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
     * Join Circle.
     *
     * @Transactional("mysql")
     *
     * @param CircleJoinCommand $command
     * @return void
     */
    public function handle(CircleJoinCommand $command):void
    {
        $memberId = new UserId($command->userId);
        $member = $this->userRepository->findById($memberId);
        if (is_null($member)) {
            throw new UserNotFoundException('ユーザが見つかりませんでした.');
        }

        $id = new CircleId($command->circleId);
        $circle = $this->circleRepository->findById($id);
        if (is_null($circle)) {
            throw new CircleNotFoundException('サークルが見つかりませんでした.');
        }

        if ($circle->getMembers()->count() >= 29) {
            throw new CircleFullException($id);
        }

        $circle->getMembers()->add($member);
        $this->circleRepository->save($circle);
    }
}
