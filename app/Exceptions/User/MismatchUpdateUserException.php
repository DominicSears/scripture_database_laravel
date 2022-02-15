<?php

namespace App\Exceptions\User;

use Exception;

final class MismatchUpdateUserException extends Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(
            empty($message) ? 'The user ID does not match the edited ID' : $message,
            $code,
            $previous
        );
    }
}