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
use packages\Techno\Sns\Infrastructure\Notification\UserDataModelBuilder;
use packages\Techno\Sns\UseCase\User\GetInfo\UserData;

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
        $userDataModelBuilder = new UserDataModelBuilder();
        $user->notify($userDataModelBuilder);

        $userDataModel = $userDataModelBuilder->build();

        EloquentUser::create(
            [
                "id" => $userDataModel->id,
                "name" => $userDataModel->name
            ]
        );
    }

    /**
     * Update User.
     *
     * @param User $user
     * @return void
     */
    public function update(User $user)
    {
        $userDataModelBuilder = new UserDataModelBuilder();
        $user->notify($userDataModelBuilder);

        $userDataModel = $userDataModelBuilder->build();

        EloquentUser::where("id", $user->getId()->getValue())->update(
            [
                "name" => $userDataModel->name
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

    /**
     * Delete user by Name.
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        $userDataModelBuilder = new UserDataModelBuilder();
        $user->notify($userDataModelBuilder);

        $userDataModel = $userDataModelBuilder->build();

        EloquentUser::where('name', '=', $userDataModel->id)->delete();
    }

    /**
     * Convert from EloquentUser to User.
     *
     * @param EloquentUser $from
     * @return User
     */
    private function toModel(EloquentUser $from): User
    {
        return new User(
            new UserId($from->id),
            new UserName($from->name)
        );
    }

    /**
     * Transfer from User to UserData.
     *
     * @param User $from
     * @param EloquentUser $model
     * @return EloquentUser
     */
    private function transfer(User $from, EloquentUser $model): EloquentUser
    {
        $model->id = $from->getName()->getValue();
        $model->name = $from->getName()->getValue();
        return $model;
    }

    /**
     * Convert from User to UserDataModel.
     *
     * @param User $from
     * @return EloquentUser
     */
    private function toDataModel(User $from): EloquentUser
    {
        $userDataModel = new EloquentUser();
        $userDataModel->id = $from->getId()->getValue();
        $userDataModel->name = $from->getName()->getValue();
        return $userDataModel;
    }
}
