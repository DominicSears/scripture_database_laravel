<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Denomination;
use App\Models\Doctrine;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public static function getPost(string $username, string $slug): JsonResource
    {
        $user = User::query()
            ->where('username', $username)
            ->with(['posts' => function ($relation) use ($slug) {
                $relation->where('slug', $slug);
            }, 'posts.updatedBy', 'posts.createdBy'])
            ->get();

        if (empty($user?->posts)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return PostResource::make(
            $user->posts->first()
        );
    }

    public static function getPosts(Request $request, ?string $type = null): JsonResource
    {
        $validator = validator(
            $request->all(),
            ['perPage' => 'integer', 'page' => 'integer']
        );

        try {
            $validated = $validator->validated();
        } catch (ValidationException) {
            return new JsonResponse([
                'errors' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $posts = Post::query()
            ->with('createdBy', 'updatedBy');

        if (isset($type)) {
            $posts = $posts->join('postables', 'post_id', 'posts.id')
                ->where('postable_type', $type);
        }

        return PostResource::collection(
            $posts->paginate(
                $validated['perPage'] ?? 10,
                ['*'],
                'page',
                $validated['page'] ?? null
            )
        );
    }

    public static function getPostsUsers(Request $request): JsonResource
    {
        return static::getPosts($request, User::class);
    }

    public static function getPostsDenomination(Request $request): JsonResource
    {
        return static::getPosts($request, Denomination::class);
    }

    public static function getPostsDoctrine(Request $request): JsonResource
    {
        return static::getPosts($request, Doctrine::class);
    }

    public static function getPostsNuggets(Request $request): JsonResource
    {
        return static::getPosts($request, Nugget::class);
    }

    public static function getPostsReligion(Request $request): JsonResource
    {
        return static::getPosts($request, Religion::class);
    }
}