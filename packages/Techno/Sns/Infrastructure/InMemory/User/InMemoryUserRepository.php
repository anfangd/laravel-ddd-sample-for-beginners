<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Infrastructure\InMemory\User;

use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;

/**
 * InMemoryUserRepository class
 *
 */
class InMemoryUserRepository implements UserRepositoryInterface
{
    /** @var array */
    public $db = [];
    /** @var array */
    public $db_name_key = [];

    /**
     * Clone User Entity.
     *
     * @param User $user
     * @return void
     */
    private function clone(User $user)
    {
        $cloned = new User($user->getId(), $user->getName());
        return $cloned;
    }

    /**
     * Save new User.
     *
     * @param User $user
     * @return void
     */
    public function save(User $user)
    {
        $this->db[$user->getId()->getValue()] = $user;
        $this->db_name_key[$user->getName()->getValue()] = $user;
    }

    /**
     * Find user by ID.
     *
     * @param UserId $userId
     * @return void
     */
    public function findById(UserId $userId)
    {
        if (array_key_exists($userId->getValue(), $this->db)) {
            $found = $this->db[$userId->getValue()];
            return $this->clone($found);
        }
        return null;
    }

    /**
     * Find user by Name.
     *
     * @param UserId $userId
     * @return void
     */
    public function findByName(UserName $userName)
    {
        if (array_key_exists($userName->getValue(), $this->db_name_key)) {
            $found = $this->db_name_key[$userName->getValue()];
            return $this->clone($found);
        }
        return null;
    }

    /**
     * Delete new User.
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        unset($this->db[$user->getId()->getValue()]);
        unset($this->db_name_key[$user->getName()->getValue()]);

    }
}
