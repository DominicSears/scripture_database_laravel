<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NuggetResource;
use App\Models\Nugget;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class NuggetController extends Controller
{
    public static function getNugget(Nugget $nugget): JsonResource
    {
        // TODO: Get relationship of the nuggetable type
        return NuggetResource::make($nugget);
    }

    public static function getNuggets(Request $request): JsonResource|JsonResponse
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

        return NuggetResource::collection(
            Nugget::query()
                ->orderBy('created_at', 'desc')
                ->paginate(
                    $validated['perPage'] ?? 10,
                    ['*'],
                    'page',
                    $validated['page'] ?? null
                )
        );
    }

    public static function getNuggetsOfType($type)
    {
        return NuggetResource::collection(
            Nugget::query()
                ->where('nugget_type_id', $type)
                ->get()
        );
    }

    public static function getRefuteNuggets(): JsonResource
    {
        return static::getNuggetsOfType(Nugget::NUGGET_TYPE_REFUTE);
    }

    public static function getSupportNuggets(): JsonResource
    {
        return static::getNuggetsOfType(Nugget::NUGGET_TYPE_SUPPORT);
    }

    public static function getGeneralNuggets(): JsonResource
    {
        return static::getNuggetsOfType(Nugget::NUGGET_TYPE_GENERAL);
    }
}