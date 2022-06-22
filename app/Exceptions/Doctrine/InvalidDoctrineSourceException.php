<?php

namespace App\Exceptions\Doctrine;

use Exception;

final class InvalidDoctrineSourceException extends Exception
{
    public function __construct(string $className, int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(
            "Object {$className} is not doctrinable",
            $code,
            $previous
        );
    }
}
