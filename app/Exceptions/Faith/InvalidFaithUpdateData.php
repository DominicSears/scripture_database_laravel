<?php

namespace App\Exceptions\Faith;

use Exception;

class InvalidFaithUpdateDataException extends Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(
            empty($message) ? 'Update action is missing a Faith object and an ID to update' : $message,
            $code,
            $previous
        );
    }
}
