<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Exceptions;

use RangeException;

class ArgumentException extends RangeException
{
    public function __construct($message, $type, $code = 0, RangeException $previous = null) {

        $message = $message . " Type:".$type;
        parent::__construct($message, $code, $previous);
    }
}
