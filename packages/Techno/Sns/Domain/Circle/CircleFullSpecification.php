<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Circle;

use Illuminate\Support\Collection;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;

class CircleFullSpecification
{
    /** @var IUserRepository */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Is Circle satisfied by ?
     *
     * @param Circle $circle
     * @return boolean
     */
    public function isSatisfiedBy(Circle $circle): bool
    {
        $members = new Collection();
        $members = $circle->getMembers()->filter(function($item){

            $found = $this->userRepository->findById(new UserId($item));
            if (is_null($found)) {
                return false;
            }
            if ($found->is_premium) {
                return true;
            }
        });

        $circleUpperLimit = $members->count() < 10 ? 30 : 20;

        return $circle->countMembers() >= $circleUpperLimit;
    }
}
