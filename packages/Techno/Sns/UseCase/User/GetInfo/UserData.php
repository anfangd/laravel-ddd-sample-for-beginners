<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\User\GetInfo;

use packages\Techno\Sns\Domain\User\User;

/**
 * UserData class
 */
class UserData
{
    /** @var string */
    public $id;
    /** @var string */
    public $name;

    /**
     * UserData constructer.
     *
     * @param User $source
     */
    public function __construct(User $source)
    {
        $this->id = $source->getId()->getValue();
        $this->name = $source->getName()->getValue();
    }
}
