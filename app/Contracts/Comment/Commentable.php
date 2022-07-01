<?php

namespace App\Contracts\Comment;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Commentable
{
    public function comments(): MorphMany;

    public function commentsWithReplies(): MorphMany;
}
