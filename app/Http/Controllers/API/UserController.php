<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\User;

class UserController extends Controller
{
    public function getPosts()
    {
        $user = User::query()
            ->with('posts')
            ->find(1);

        return PostResource::collection($user->posts);
    }

    /*public function getNuggets(User $user)
    {
        $user->load('nuggets');

        return NuggetResource::collection($user->nuggets);
    }*/
}