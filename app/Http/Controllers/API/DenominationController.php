<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Nugget;
use App\Models\Doctrine;
use App\Models\Religion;
use App\Models\Denomination;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\NuggetResource;
use App\Http\Resources\DoctrineResource;
use App\Http\Resources\DenominationResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Resources\Json\JsonResource;

class DenominationController extends Controller
{
    public static function getDenomination(Denomination $denomination): JsonResource
    {
        return DenominationResource::make($denomination);
    }

    public function getDenominations(Request $request): JsonResource|JsonResponse
    {
        $validator = validator(
            $request->all(),
            ['perPage' => 'integer', 'page' => 'integer']
        );

        try {
            $validated = $validator->validated();
        } catch (ValidationException) {
            return new JsonResponse([
                'errors' => $validator->errors(),
            ], Response::HTTP_BAD_REQUEST);
        }

        return DenominationResource::collection(
            Denomination::query()
                ->with('religion', 'parent')
                ->paginate(
                    $validated['perPage'] ?? 10,
                    ['*'],
                    'page',
                    $validated['page'] ?? null
                )
        );
    }

    public static function getUsers(Denomination $denomination): JsonResource
    {
        return UserResource::collection(
            User::query()
                ->select('users.*', 'faiths.denomination_id', 'faiths.user_id', 'faiths.id as scoped_id')
                ->from('faiths')
                ->join('users', 'users.id', '=', 'faiths.user_id')
                ->where('faiths.denomination_id', $denomination->getKey())
                ->distinct()
                ->with(['scopedFaith.religion', 'scopedFaith.denomination' => fn ($q) => $denomination])
                ->get()
        );
    }

    public static function getUsersWithCurrentFaith(Denomination $denomination): JsonResource
    {
        return UserResource::collection(
            User::query()
                ->select('users.*', 'faiths.id as faith_id2', 'faiths.denomination_id')
                ->join('faiths', 'faiths.id', '=', 'users.faith_id')
                ->where('faiths.denomination_id', $denomination->getKey())
                ->with(['faith', 'faith.religion', 'faith.denomination' => fn ($q) => $denomination])
                ->get()
        );
    }

    public static function getDoctrine(Denomination $denomination): JsonResource
    {
        return DoctrineResource::collection(
            Doctrine::query()
                ->join('doctrinables', 'doctrinables.doctrine_id', '=', 'doctrines.id')
                ->where(function ($query) use ($denomination) {
                    $query->where('doctrinable_type', Denomination::class);
                    $query->where('doctrinable_id', $denomination->getKey());
                })
                ->orWhere(function ($query) use ($denomination) {
                    $query->where('doctrinable_type', Religion::class);
                    $query->where('doctrinable_id', $denomination->getAttribute('religion_id'));
                })
                ->get()
        );
    }

    public static function getNuggets(Denomination $denomination, ?int $type = null): JsonResource
    {
        $query = Nugget::query()
            ->select('nuggets.*', 'nuggetables.*')
            ->from('nuggetables')
            ->join('nuggets', 'nuggetables.nugget_id', '=', 'nuggets.id')
            ->where('nuggetable_type', Denomination::class)
            ->where('nuggetable_id', $denomination->getKey());

        if (isset($type)) {
            $query = $query->where('nuggets.nugget_type_id', $type);
        }

        return NuggetResource::collection($query->get());
    }

    public static function getAllNuggets(Denomination $denomination): JsonResource
    {
        return static::getNuggets($denomination);
    }

    public static function getRefuteNuggets(Denomination $denomination): JsonResource
    {
        return static::getNuggets($denomination, Nugget::NUGGET_TYPE_REFUTE);
    }

    public function getSupportNuggets(Denomination $denomination): JsonResource
    {
        return static::getNuggets($denomination, Nugget::NUGGET_TYPE_SUPPORT);
    }

    public function getGeneralNuggets(Denomination $denomination): JsonResource
    {
        return static::getNuggets($denomination, Nugget::NUGGET_TYPE_GENERAL);
    }
}
