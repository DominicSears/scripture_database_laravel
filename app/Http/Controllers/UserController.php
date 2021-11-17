<?php

namespace App\Http\Controllers;

use App\Models\Denomination;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUser(User $user)
    {
        echo $user->name;
    }

    public function edit(User $user)
    {
        $user->load('allFaiths');

        return view('users.edit', [
            'user' => $user,
            'religions' => Religion::query()->where('approved', true)->get(),
            'denominations' => Denomination::query()->where('approved', true)->get()
        ]);
    }
}
