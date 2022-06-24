<?php

namespace App\Http\Controllers;

use App\Models\Denomination;
use App\Models\Religion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReligionController extends Model
{
    public function list(Request $request)
    {
        $showPending = $request->get('showPending', false);

        return view('religions.list', [
            'showPending' => $showPending,
        ]);
    }

    public function create()
    {
        return view('religions.create');
    }

    public function createDenomination(Religion $religion)
    {
        $religion->load('denominations');

        return view('religions.create-denomination', [
            'religion' => $religion,
        ]);
    }

    public function editDenomination(Religion $religion, Denomination $denomination)
    {
        if ($denomination->religion_id !== $religion->getKey()) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return view('livewire.religions.update-denomination', [
            'religion' => $religion,
            'denomination' => $denomination,
        ]);
    }

    public function show(Religion $religion)
    {
        $religion->load(['allDenominations', 'doctrines']);

        return view('religions.show', [
            'religion' => $religion,
        ]);
    }
}
