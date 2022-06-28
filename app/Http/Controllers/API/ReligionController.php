<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DenominationResource;
use App\Http\Resources\DoctrineResource;
use App\Http\Resources\NuggetResource;
use App\Http\Resources\ReligionResource;
use App\Http\Resources\UserResource;
use App\Models\Denomination;
use App\Models\Doctrine;
use App\Models\Nugget;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ReligionController extends Controller
{
    public static function getReligion(Religion $religion)
    {
        $religion->load('parent');

        return ReligionResource::make($religion);
    }

    /**
     * Get a list of all the religions
     *
     * @param  Request  $request
     * @return JsonResource
     *
     * @throws ValidationException
     */
    public function getReligions(Request $request): JsonResource
    {
        $validator = validator(
            $request->all(),
            ['perPage' => 'integer', 'page' => 'integer']
        );

        try {
            $validated = $validator->validated();
        } catch (ValidationException) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return ReligionResource::collection(
            Religion::query()
                ->with('parent')
                ->paginate(
                    $validated['perPage'] ?? 10,
                    ['*'],
                    'page',
                    $validated['page'] ?? null
                )
        );
    }

    public static function getDenominations(Religion $religion)
    {
        return DenominationResource::collection(
            Denomination::query()
                ->where('religion_id', $religion->getKey())
                ->with(['parent', 'religion' => fn () => $religion])
                ->get()
        );
    }

    public static function getUsers(Religion $religion)
    {
        return UserResource::collection(
            User::query()
                ->select('users.*', 'faiths.religion_id', 'faiths.user_id', 'faiths.id as scoped_id')
                ->from('faiths')
                ->join('users', 'users.id', '=', 'faiths.user_id')
                ->where('faiths.religion_id', $religion->getKey())
                ->distinct()
                ->with(['scopedFaith.denomination', 'scopedFaith.religion' => fn () => $religion])
                ->get()
        );
    }

    public static function getUsersWithCurrentFaith(Religion $religion)
    {
        return UserResource::collection(
            User::query()
                ->select('users.*', 'faiths.id as faith_id2', 'faiths.religion_id')
                ->join('faiths', 'faiths.id', '=', 'users.faith_id')
                ->where('faiths.religion_id', $religion->getKey())
                ->with(['faith', 'faith.denomination', 'faith.religion' => fn () => $religion])
                ->get()
        );
    }

    public static function getDoctrine(Religion $religion)
    {
        return DoctrineResource::collection(
            Doctrine::query()
                ->where('religion_id', $religion->getKey())
                ->where('denomination_id', null)
                ->with(['createdBy', 'religion', 'religion' => fn () => $religion])
                ->get()
        );
    }

    public static function getNuggets(Religion $religion, ?int $type = null)
    {
        $query = Nugget::query()
            ->select('nuggets.*', 'nuggetables.*')
            ->from('nuggetables')
            ->join('nuggets', 'nuggetables.nugget_id', '=', 'nuggets.id')
            ->where('nuggetable_type', Religion::class)
            ->where('nuggetable_id', $religion->getKey());

        if (isset($type)) {
            $query = $query->where('nuggets.nugget_type_id', $type);
        }

        return NuggetResource::collection($query->get());
    }

    public static function getAllNuggets(Religion $religion)
    {
        return static::getNuggets($religion);
    }

    public static function getRefuteNuggets(Religion $religion)
    {
        return static::getNuggets($religion, Nugget::NUGGET_TYPE_REFUTE);
    }

    public function getSupportNuggets(Religion $religion)
    {
        return static::getNuggets($religion, Nugget::NUGGET_TYPE_SUPPORT);
    }

    public function getGeneralNuggets(Religion $religion)
    {
        return static::getNuggets($religion, Nugget::NUGGET_TYPE_GENERAL);
    }
}
