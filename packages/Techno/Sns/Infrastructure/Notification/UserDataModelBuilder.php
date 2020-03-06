<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Infrastructure\Notification;

use App\Database\Eloquent\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Domain\User\UserNotificationInterface;

/**
 * UserDataModelBuilder class
 *
 */
class UserDataModelBuilder implements UserNotificationInterface
{
    /** @var UserId */
    private $id;
    /** @var UserName */
    private $name;

    /**
     * Set User ID.
     *
     * @param UserId $id
     * @return void
     */
    public function id(UserId $id): void
    {
        $this->id = $id;
    }

    /**
     * Set User Name.
     *
     * @param UserName $name
     * @return void
     */
    public function name(UserName $name): void
    {
        $this->name = $name;
    }

    /**
     * Undocumented function
     *
     * @return User
     */
    public function build(): User
    {
        $userDataModel = new User();
        $userDataModel->id = $this->id->getValue();
        $userDataModel->name = $this->name->getValue();
        return $userDataModel;
    }
}
