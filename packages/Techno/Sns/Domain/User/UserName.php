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
 * UserName class
 * 
 * 
 */
class UserName
{
    /* @var string */

    private $value;

    /**
     * UserName constructer.
     *
     * @param string $value User Name
     */
    public function __construct(string $value)
    {
        if (is_null($value)) throw new ArgumentNullException(gettype($value));
        if (mb_strlen($value) < 3) throw new ArgumentException("ユーザ名は３文字以上です。",gettype($value));

        $this->value = $value;
    }

    /**
     * Get User Name.
     *
     * @return void
     */
    public function getValue()
    {
        return $this->value;
    }
}
