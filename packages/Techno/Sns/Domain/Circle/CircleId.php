<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Circle;

use packages\Techno\Sns\Domain\Exceptions\ArgumentNullException;

/**
 * CircleId class
 *
 */
class CircleId
{
    /* @var string */
    private $value;

    /**
     * CircleId constructer.
     *
     * @param string $value User ID
     */
    public function __construct(string $value)
    {
        //TODO: create custom exception.
        if (is_null($value)) {
            throw new ArgumentNullException();
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
