<?php

namespace App\Exceptions\Faith;

use Exception;

class MismatchFaithUserException extends Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(
            empty($message) ? 'User object ID does not match the faith data user id' : $message,
            $code,
            $previous
        );
    }
}