<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Circle;

use Illuminate\Support\Collection;
use packages\Techno\Sns\Domain\Exceptions\ArgumentException;
use packages\Techno\Sns\Domain\Exceptions\ArgumentNullException;
use packages\Techno\Sns\Domain\Exceptions\CircleFullException;
use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;

/**
 * User class
 *
 */
class Circle
{
    /** @var CircleId */
    private $id;
    /** @var CircleName */
    private $name;
    /** @var User */
    private $owner;
    /** @var Collection */
    private $members;

    /**
     * Circle constructer.
     *
     * @param CircleId $id
     * @param CircleName $name
     */
    public function __construct(
        CircleId $id,
        CircleName $name,
        User $owner,
        Collection $members
    ) {
        if (is_null($id)) {
            throw new ArgumentNullException();
        }
        if (is_null($name)) {
            throw new ArgumentNullException();
        }
        if (is_null($owner)) {
            throw new ArgumentNullException();
        }
        if (is_null($members)) {
            throw new ArgumentNullException();
        }

        $this->id = $id;
        $this->name = $name;
        $this->owner = $owner;
        $this->members = $members;
    }

    /**
     * Get CircleId.
     *
     * @return CircleId
     */
    public function getId(): CircleId
    {
        return $this->id;
    }

    /**
     * Get CircleName.
     *
     * @return CircleName
     */
    public function getName(): CircleName
    {
        return $this->name;
    }

    /**
     * Get User.
     *
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * Get Members.
     *
     * @return Collection
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    /**
     * Change Circle Name.
     *
     * @param string $name
     * @return void
     */
    public function changeCircleName(string $name): void
    {
        if (is_null($name)) {
            throw new ArgumentNullException();
        }
        if (mb_strlen($name) < 3) {
            throw new ArgumentException("ユーザ名は３文字以上です。", $name);
        }

        $this->name = new CircleNameValueObject($name);
    }

    /**
     * Validate Circle Object.
     *
     * @param Circle $other
     * @return boolean
     */
    public function equals(Circle $other): bool
    {
        return $this->id == $other->id;
    }

    /**
     * Is Circle Member full ?
     *
     * @return boolean
     */
    public function isFull(): bool
    {
        return $this->countMembers() >= 30;
    }

    /**
     * Count Circle Members.
     *
     * @return integer
     */
    public function countMembers(): int
    {
        return $this->members->count() + 1;
    }

    /**
     * Add new member.
     *
     * @param UserIdValueObject $member
     * @return void
     */
    public function join(UserId $member): void
    {
        if (is_null($member)) {
            throw new ArgumentNullException();
        }

        if ($this->isFull()) {
            throw new CircleFullException();
        }

        $this->members->add($member);
    }
}
