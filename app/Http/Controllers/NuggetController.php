<?php

namespace App\Http\Controllers;

use App\Contracts\Nuggets\CreatesNugget;
use App\Models\User;
use App\Models\Nugget;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class NuggetController extends Controller
{
    public function list(): View
    {
        $nuggets = Nugget::with(['religions', 'denominations', 'doctrines', 'nuggetable'])->get();

        return view('nuggets.list', [
            'nuggets' => $nuggets,
        ]);
    }

    public function fromUser(User $user): View
    {
        $user->load(['nuggets']);

        return view('nuggets.user', [
            'user' => $user->withoutRelations(),
            'nuggets' => $user->nuggets ?? [],
        ]);
    }
}
