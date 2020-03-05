<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\UseCase\User\Update;

/**
 * UserUpdateCommand class
 */
class UserUpdateCommand
{

    /** @var string */
    public $id;
    /** @var string */
    public $name;
    /** @var string */
    public $mailAddress;

    /**
     * UserUpdateCommand construcer.
     *
     * @param string $id
     * @param string $name
     * @param string $mailAddress
     */
    public function __construct(string $id, string $name=null, string $mailAddress=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mailAddress = $mailAddress;
    }
}
