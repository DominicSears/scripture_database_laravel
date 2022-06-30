<?php

namespace App\Traits;

trait MapsModels
{
    public function mapToCodeName(string $className): ?string
    {
        return empty($className) ?
            null : substr(strrchr($className, '\\'), 1);
    }

    public function mapToClassName(string $codeName): ?string
    {
        return 'App\\Models\\'.$codeName;
    }
}
