<?php

namespace App\Exceptions\Denomination;

use Exception;

final class MismatchUpdateDenominationException extends Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(
            empty($message) ? 'The denomination ID does not match the edited ID' : $message,
            $code,
            $previous
        );
    }
}