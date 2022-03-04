<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use App\Models\Denomination;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;

class ReligionController extends Model
{
    public function list(Request $request)
    {
        $showPending = $request->get('showPending', false);

        $religions = Religion::query();

        if (! $showPending) {
            $religions = $religions->where('approved', true);
        }

        return view('religions.list', [
            'religions' => $religions->get()
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
            'religion' => $religion
        ]);
    }

    public function editDenomination(Religion $religion, Denomination $denomination)
    {
        if ($denomination->religion_id !== $religion->getKey()) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return view('livewire.religions.update-denomination', [
            'religion' => $religion,
            'denomination' => $denomination
        ]);
    }

    public function denominations(Religion $religion)
    {
        $religion->load('allDenominations');

        return view('religions.list-denominations', [
            'religion' => $religion
        ]);
    }
}