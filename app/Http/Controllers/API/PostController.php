<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public static function getPost(string $username, string $slug)
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

    public static function getPosts(Request $request)
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

        // TODO: Get type, change post to have postable to include the type relationship
        return PostResource::collection(
            Post::query()
                ->with('createdBy', 'updatedBy')
                ->paginate(
                    $validated['perPage'] ?? 10,
                    ['*'],
                    'page',
                    $validated['page'] ?? null
                )
        );
    }
}