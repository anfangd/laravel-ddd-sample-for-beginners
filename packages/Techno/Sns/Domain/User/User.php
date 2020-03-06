<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Techno\Sns\Domain\User;

use packages\Techno\Sns\Domain\Exceptions\ArgumentException;
use packages\Techno\Sns\Domain\Exceptions\ArgumentNullException;

/**
 * User class
 *
 */
class User
{
    /** @var UserId */
    private $id;
    /** @var UserName */
    private $name;

    /**
     * User constructer.
     *
     * @param UserId $id
     * @param UserName $name
     */
    public function __construct(UserId $id, UserName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get UserIdValueObject.
     *
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * Get UserNameValueObject.
     *
     * @return UserName
     */
    public function getName(): UserName
    {
        return $this->name;
    }

    /**
     * Change User Name.
     *
     * @param string $name
     * @return void
     */
    public function changeUserName(string $name): void
    {
        if (is_null($name)) {
            throw new ArgumentNullException();
        }
        if (mb_strlen($name) < 3) {
            throw new ArgumentException("ユーザ名は３文字以上です。", gettype($name));
        }

        $this->name = new UserName($name);
    }

    /**
     * Validate User Object.
     *
     * @param User $other
     * @return boolean
     */
    public function equals(User $other): bool
    {
        return $this->id == $other->id;
    }

    /**
     * Notify.
     *
     * @param UserNotificationInterface $note
     * @return void
     */
    public function notify(UserNotificationInterface $note): void
    {
        $note->id($this->id);
        $note->name($this->name);
    }
}