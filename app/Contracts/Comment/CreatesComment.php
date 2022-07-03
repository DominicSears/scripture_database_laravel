<?php

namespace App\Contracts\Comment;

interface CreatesComment
{
    public function __invoke(array $data);
}
