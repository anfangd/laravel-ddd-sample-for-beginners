<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Application\Circle\Invite;

use Exception;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\Domain\Service\CircleService;
use packages\Techno\Sns\Domain\Circle\ICircleRepository;
use packages\Techno\Sns\Domain\Circle\CircleFactoryInterface;
use packages\Techno\Sns\Domain\Circle\CircleId;
use packages\Techno\Sns\Domain\Circle\CircleRepositoryInterface;
use packages\Techno\Sns\UseCase\Circle\Invite\CircleInviteCommand;
use packages\Techno\Sns\UseCase\Circle\Invite\CircleInviteServiceInterface;

// Annotation
use Ytake\LaravelAspect\Annotation\Transactional;

/**
 * CircleInviteService class
 */
class CircleInviteService implements CircleInviteServiceInterface
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
     * Invite Circle.
     *
     * @Transactional("mysql")
     *
     * @param CircleInviteCommand $command
     * @return void
     */
    public function handle(CircleInviteCommand $command):void
    {
        $fromUserId = new UserId($command->fromUserId);
        $fromUser = new $this->userRepository->find($fromUserId);
        if (is_null($fromUser)) {
            throw new Exception('招待元ユーザが見つかりません');
        }

        $invitedUserId = new UserId($command->invitedUserId);
        $invitedUser = $this->userRepository->find($invitedUserId);
        if (is_null($invitedUser)) {
            throw new Exception('招待先ユーザが見つかりませんでした');
        }

        $circleId = new CircleId($command->circleId);
        $circle = new $this->circleRepository->findById($circleId);
        if (is_null($circle)) {
            throw new Exception('サークルが見つかりませんでした');
        }

        if ($circle->members->count >= 29) {
            throw new Exception($circleId);
        }

        //TODO: CircleInvitation ドメインを作成する.
        $circleInvitation = new CircleInvitation($circle, $fromUser, $invitedUser);
        $this->circleInvitationRepository->save($circleInvitation);
    }
}
