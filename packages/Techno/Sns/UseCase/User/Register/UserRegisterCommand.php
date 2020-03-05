<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */
namespace packages\Techno\Sns\UseCase\User\Register;

/**
 * UserRegisterCommand class
 */
class UserRegisterCommand
{
    /** @var string */
    public $name;
    /** @var string */
    public $mailAddress;

    /**
     * UserRegisterCommand construcer.
     *
     * @param string $id
     * @param string $name
     * @param string $mailAddress
     */
    public function __construct(string $name=null, string $mailAddress=null)
    {
        $this->name = $name;
        $this->mailAddress = $mailAddress;
    }
}
