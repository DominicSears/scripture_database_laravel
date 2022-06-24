<?php

namespace App\Services;

use App\Http\Requests\UpdateFaithRequest;
use App\Models\Faith;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class FaithService
{
    public static function getUserFromFaith(Faith $faith): User
    {
        return User::query()
            ->scopes(['fromFaith' => [$faith]])
            ->first();
    }

    public static function updateUserFaith(UpdateFaithRequest $request, User $user): Faith
    {
        $faith = Faith::query()
            ->create($request->except(['end_of_faith', 'reason_left']));

        Faith::query()
            ->where('faith_id', $user->faith_id)
            ->update(['end_of_faith' => $request->get('end_of_faith')]);

        $user->faith_id = $faith->getKey();

        $user->save();

        return $faith;
    }

    public static function createFaith(array $data): Faith
    {
        return Faith::query()
            ->create([
                'religion_id' => $data['religion_id'],
                'denomination_id' => $data['denomination_id'] ?? null,
                'start_of_faith' => $data['start_of_faith'],
                'end_of_faith' => $data['end_of_faith'] ?? null,
                'user_id' => $data['user_id'],
                'note' => $data['note'],
            ]);
    }

    public static function getFaithRequestValidator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make(
            $data,
            [
                'religion_id' => ['required', 'integer'],
                'denomination_id' => ['somtimes', 'integer'],
                'start_of_faith' => ['required', 'date'],
                'note' => ['string', 'max:255'],
                'reason_left' => ['string', 'max:255'],
            ]
        );
    }
}
