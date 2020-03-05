<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Techno\Sns\Domain\User;

use packages\Techno\Sns\Domain\Exceptions\ArgumentNullException;

/**
 * UserId class
 *
 */
class UserId
{
    /** @var string */
    private $value;

    /**
     * UserId constructer.
     *
     * @param string $value User ID
     */
    public function __construct(string $value)
    {
        if (is_null($value)) {
            throw new ArgumentNullException(get_class($value));
        }
        $this->value = $value;
    }

    /**
     * Get User ID.
     *
     * @return void
     */
    public function getValue()
    {
        return $this->value;
    }
}
