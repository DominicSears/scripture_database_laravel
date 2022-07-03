<?php

namespace App\Actions\Comment;

use App\Contracts\Comment\CreatesComment;
use App\Contracts\Comment\ValidatesComment;

final class CreateComment implements CreatesComment
{
    public function __construct(private ValidatesComment $commentValidator)
    {
    }

    /**
     * Create comment
     *
     * @param  array  $data
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(array $data)
    {
        //$validated = ($this->commentValidator)($data)->validate();
        $validated = $data;

        \App\Models\Comment::query()
            ->create($validated);
    }
}
