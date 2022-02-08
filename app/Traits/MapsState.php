<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait MapsState
{
    public function removeStateKeys(array $array): array
    {
        $newArray = [];

        foreach ($array as $key => $value) {
            $key = Str::after('state.', $key);
            $newArray[$key] = $value;
        }

        return $newArray;
    }

    public function addStateKeys(array $array): array
    {
        $newArray = [];

        foreach ($array as $key => $value) {
            $key = 'state.'.$key;
            $newArray[$key] = $value;
        }

        return $newArray;
    }
}