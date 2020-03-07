<?php

namespace packages\Techno\Sns\Domain\Exceptions;

use RuntimeException;

class CanNotRegisterUserException extends RuntimeException
{
    public function __construct($user, $message, $code = 0, RuntimeException $previous = null) {

        $message = $message;
        parent::__construct($message, $code, $previous);
    }
}
