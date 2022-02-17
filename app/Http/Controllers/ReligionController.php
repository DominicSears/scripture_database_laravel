<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Database\Eloquent\Model;

class ReligionController extends Model
{
    public function createDenomination(Religion $religion)
    {
        $religion->load('denominations');

        return view('religions.createDenomination', [
            'religion' => $religion
        ]);
    }
}