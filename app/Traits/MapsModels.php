<?php

namespace App\Traits;

use App\Models\Vote;
use App\Models\Follow;
use App\Models\Comment;

trait MapsModels
{
    public function isClassName(string $name)
    {
        return str_contains($name, 'App\\Models\\');
    }

    public function mapToCodeName(string $className): ?string
    {
        return empty($className) ?
            null : ($this->isClassName($className)
                ? substr(strrchr($className, '\\'), 1)
                : $className
            );
    }

    public function mapToClassName(string $codeName): ?string
    {
        return $this->isClassName($codeName)
            ? $codeName
            : 'App\\Models\\'.$codeName;
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
