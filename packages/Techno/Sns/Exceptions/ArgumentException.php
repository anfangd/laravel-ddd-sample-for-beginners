<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace packages\Techno\Sns\Domain\Exceptions;

use RuntimeException;

class ArgumentException extends RuntimeException
{
    public function __construct($message, $type, $code = 0, RuntimeException $previous = null) {

        $message = $message . " Type:".$type;
        parent::__construct($message, $code, $previous);
    }
}
