<?php

namespace App\Http\Controllers\API;

use Countable;
use App\Models\User;
use App\Models\Nugget;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public static function getPosts(User $user, string $relation): JsonResource
    {
        $posts = $user->getRelation($relation);

        return $posts instanceof Countable ?
            PostResource::collection($posts) : PostResource::make($posts);
    }

    public static function getAllPosts(User $user): JsonResource
    {
        return static::getPosts(
            $user->load(['posts', 'posts.createdBy', 'posts.updatedBy']),
            'posts'
        );
    }

    public static function getUpdatedByPosts(User $user): JsonResource
    {
        return static::getPosts(
            $user->load(['updatedPosts.updatedBy', 'updatedPosts.createdBy']),
            'updatedPosts'
        );
    }

    public static function getNuggets(User $user): JsonResource
    {
        return UserResource::make(
            UserService::getUserWithNuggets($user)
        );
    }

    public static function getRefuteNuggets(User $user): JsonResource
    {
        return static::getNuggetsOfType($user, Nugget::NUGGET_TYPE_REFUTE);
    }

    public static function getSupportNuggets(User $user): JsonResource
    {
        return static::getNuggetsOfType($user, Nugget::NUGGET_TYPE_SUPPORT);
    }

    public function getGeneralNuggets(User $user): JsonResource
    {
        return static::getNuggetsOfType($user, Nugget::NUGGET_TYPE_GENERAL);
    }

    public static function getNuggetsOfType(User $user, int $type): JsonResource
    {
        return UserResource::make(
            UserService::getUserNuggetsOfType($user, $type)
        );
    }

    public static function getUser(Request $request, User $user): JsonResource
    {
        return UserResource::make(
            UserService::getUser($request, user: $user)
        );
    }
}