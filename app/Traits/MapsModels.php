<?php

namespace App\Traits;

use App\Models\Vote;

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

    public function canMapToComment(string $name, bool $isCodeName): bool
    {
        if ($isCodeName) {
            $name = $this->mapToClassName($name);
        }

        return ! in_array($name, [
            Comment::class,
            Follow::class,
            Vote::class,
        ]);
    }
}
