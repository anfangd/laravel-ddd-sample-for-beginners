<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Techno\Sns\Infrastructure\Eloquent\User;

use App\Database\Eloquent\User as EloquentUser;
use Illuminate\Support\Facades\DB;
use packages\Techno\Sns\Domain\User\UserRepositoryInterface;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;

/**
 * UserRepository class
 *
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * Save new User.
     *
     * @param User $user
     * @return void
     */
    public function save(User $user)
    {
        EloquentUser::create(
            [
                "id" => $user->getId()->getValue(),
                "name" => $user->getName()->getValue()
            ]
        );
    }

    /**
     * Find user by Id.
     *
     * @param UserId $userId
     * @return void
     */
    public function findById(UserId $userId)
    {
        $found = EloquentUser::where('id', '=', $userId->getValue())->get();

        if ($found->isEmpty()) {
            return null;
        }

        return new User(
            new UserId($found->get(0)->id),
            new UserName($found->get(0)->name)
        );
    }

    /**
     * Find user by Name.
     *
     * @param UserName $userName
     * @return void
     */
    public function findByName(UserName $userName)
    {
        $found = EloquentUser::where('name', '=', $userName->getValue())->get();

        if ($found->isEmpty()) {
            return null;
        }

        return new User(
            new UserId($found->get(0)->id),
            new UserName($found->get(0)->name)
        );
    }
}
