<?php

namespace App\Services;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Faith;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function getUser(Request $request, ?string $userId = null, ?User $user = null): User
    {
        $user ??= User::query()->find($userId);

        if ($request->has('allFaiths') && $request->get('allFaiths')) {
            $user->load([
                'allFaiths' => fn ($q) => $q->orderBy('start_of_faith', 'desc'),
                'allFaiths.religion',
                'allFaiths.denomination',
            ]);
        } else {
            $user->load(['faith', 'faith.religion', 'faith.denomination']);
        }

        return $user;
    }

    public static function getUserNuggetsOfType(User $user, int $type): User
    {
        return $user->load(['nuggets' => function ($relation) use ($type) {
            $relation->where('nugget_type_id', $type);
            $relation->orderBy('created_at', 'desc');
        }, 'nuggets.createdBy']);
    }

    public static function getUserWithNuggets(User $user): User
    {
        return $user->load(['nuggets' => fn ($q) => $q->orderBy('created_at', 'desc')]);
    }

    public static function createUserWithFaith(CreateUserRequest $request): User
    {
        $user = User::query()
            ->create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'username' => $request->get('username'),
                'password' => Hash::make($request->get('password')),
                'gender' => $request->get('gender'),
                'country_iso_code' => $request->get('country_iso_code'),
            ]);

        $faith = Faith::query()
            ->create([
                'religion_id' => $request->get('religion_id'),
                'denomination_id' => $request->get('denomination_id'),
                'user_id' => $user->getKey(),
                'start_of_faith' => $request->get('start_of_faith'),
                'note' => $request->get('note'),
            ]);

        $user->faith_id = $faith->getKey();

        $user->save();

        $user->setRelation('faith', $faith);

        return $user;
    }

    public static function updateUser(UpdateUserRequest $request, User $user): User
    {
        $request->validate($request->rules(), $request->toArray());

        $user->update($request->validated());

        return $user;
    }
}
