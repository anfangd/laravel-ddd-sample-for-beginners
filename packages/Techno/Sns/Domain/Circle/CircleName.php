<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Circle;

use packages\Techno\Sns\Domain\Exceptions\ArgumentException;
use packages\Techno\Sns\Domain\Exceptions\ArgumentNullException;

/**
 * CircleName class
 *
 */
class CircleName
{
    /* @var string */
    private $value;

    /**
     * CircleName constructer.
     *
     * @param string $value User Name
     */
    public function __construct(string $value)
    {
        //TODO: create custom exception.
        if (is_null($value)) {
            throw new ArgumentNullException();
        }
        if (mb_strlen($value) < 3) {
            throw new ArgumentException("ユーザ名は３文字以上です。", $value);
        }
        if (mb_strlen($value) >20) {
            throw new ArgumentException("ユーザ名は３文字以上です。", $value);
        }

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

    /**
     * Validate Circle Name.
     *
     * @param CircleName $other
     * @return boolean
     */
    public function equals(CircleName $other): bool
    {
        if (is_null($other)) {
            return false;
        }
        if ($this == $other) {
            return true;
        }
        return $this->value == $other->value;
    }
}
