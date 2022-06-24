<?php

namespace App\Exceptions\Denomination;

use Exception;

final class InvalidDenominationUpdateException extends Exception
{
    public function __construct(string $message = '', int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(
            empty($message) ? 'Not enough information provided for update modal' : $message,
            $code,
            $previous
        );
    }
}
