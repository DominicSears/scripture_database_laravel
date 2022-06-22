<?php

namespace App\Traits;

trait ConvertEmptyArrayStrings
{
    protected function convertEmptyArrayStrings(array $state): array
    {
        foreach ($state as $key => $value) {
            if (is_string($value) && empty($value)) {
                $state[$key] = null;
            }
        }

        return $state;
    }
}
