<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use App\Models\Denomination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class ReligionController extends Model
{
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
        $religion->load('denominations');

        return view('religions.list-denominations', [
            'religion' => $religion
        ]);
    }
}