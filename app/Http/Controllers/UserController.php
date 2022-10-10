<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Religion;
use App\Models\Denomination;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(?string $username = null)
    {
        $user = User::query()
            ->with([]);

        $identifier = is_numeric($username)
            ? 'id' : 'username';

        $user = $user->where($identifier, $username)
            ->first();

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function users()
    {
        return view('users.index', [
            'users' => User::with(['faith.religion', 'faith.denomination'])->simplePaginate(10),
        ]);
    }

    public function edit(Request $request, ?User $user = null, ?int $faith_id = null)
    {
        $user ??= $request->user();

        $user->load(['allFaiths.denomination', 'allFaiths.religion']);

        return view('users.edit', [
            'user' => $user,
            'religions' => Religion::query()->where('approved', true)->get(),
            'denominations' => Denomination::query()->where('approved', true)->get(),
            'faith_id' => $faith_id,
        ]);
    }
}
