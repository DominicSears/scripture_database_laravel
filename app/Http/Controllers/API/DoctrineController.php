<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctrineResource;
use App\Http\Resources\NuggetResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\ReligionResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\DenominationResource;
use App\Models\Doctrine;
use App\Models\Nugget;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctrineController extends Controller
{
    public static function getDoctrine(Doctrine $doctrine): JsonResource
    {
        return DoctrineResource::make($doctrine->load(['denomination', 'religion']));
    }

    public static function usersWithDoctrine(Doctrine $doctrine): JsonResource
    {
        return UserResource::collection(
            User::query()
                ->scopes(['byDoctrine' => [$doctrine->getKey()]])
                ->with('faith.religion', 'faith.denomination')
                ->get()
        );
    }

    public static function getPosts(): JsonResource
    {
        // TODO: Implement when postable is implemented
        return PostResource::collection(
            []
        );
    }

    public static function getReligions(Doctrine $doctrine): JsonResource
    {
        $doctrine->load('religion');

        // TODO: Implement when doctrinable or when a doctrine can apply to more than one religion
        return ReligionResource::make($doctrine->getRelation('religion'));
    }

    public static function getDenominations(Doctrine $doctrine): JsonResource
    {
        $doctrine->load('denomination');

        // TODO: Implement when doctrinable or when a doctrine can apply to more than one religion
        return DenominationResource::make($doctrine->getRelation('denomination'));
    }

    public static function getNuggets(Doctrine $doctrine, ?int $type = null): JsonResource
    {
        $nuggets = Nugget::query()
            ->join('nuggetables', 'nuggets.id', '=', 'nuggetables.nugget_id')
            ->where('nuggetable_type', Doctrine::class)
            ->where('nuggetable_id', $doctrine->getKey());

        if (isset($type)) {
            $nuggets = $nuggets->where('nugget_type_id', $type);
        }

        return NuggetResource::collection($nuggets->get());
    }

    public static function getRefuteNuggets(Doctrine $doctrine): JsonResource
    {
        return static::getNuggets($doctrine, Nugget::NUGGET_TYPE_REFUTE);
    }

    public static function getSupportNuggets(Doctrine $doctrine): JsonResource
    {
        return static::getNuggets($doctrine, Nugget::NUGGET_TYPE_SUPPORT);
    }

    public static function getGeneralNuggets(Doctrine $doctrine): JsonResource
    {
        return static::getNuggets($doctrine, Nugget::NUGGET_TYPE_GENERAL);
    }
}