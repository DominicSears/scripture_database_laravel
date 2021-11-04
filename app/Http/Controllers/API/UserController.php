<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Nugget;
use App\Models\User;
use Countable;
use Illuminate\Http\Request;
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
        $user->load(['nuggets' => fn($q) => $q->orderBy('created_at', 'desc')]);

        return UserResource::make($user);
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
        $user->load(['nuggets' => function ($relation) use ($type) {
            $relation->where('nugget_type_id', $type);
            $relation->orderBy('created_at', 'desc');
        }, 'nuggets.createdBy']);

        return UserResource::make($user);
    }

    public static function getUser(Request $request, User $user): JsonResource
    {
        if ($request->has('allFaiths') && $request->get('allFaiths')) {
            $user->load([
                'allFaiths' => fn($q) => $q->orderBy('start_of_faith', 'desc'),
                'allFaiths.religion',
                'allFaiths.denomination'
            ]);
        } else {
            $user->load(['faith', 'faith.religion', 'faith.denomination']);
        }

        return UserResource::make($user);
    }
}