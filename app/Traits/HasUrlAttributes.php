<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUrlAttributes
{
    /**
     * Get the name of the class without the namespace
     *
     * @return string
     */
    public static function getBaseName(): string
    {
        $className = static::class;

        if ($pos = strrpos($className, '\\')) {
            return substr($className, $pos + 1);
        }

        return $className;
    }

    public function getShowRouteAttributes(): array
    {
        $name = static::getBaseName();

        return [
            Str::plural($name).'.show',
            [$name => $this->getKey()],
        ];
    }
}
