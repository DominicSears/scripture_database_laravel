<?php

namespace App\Http\Controllers;

use App\Models\Religion;

class DenominationController extends Controller
{
    public function createDenomination()
    {
        return view('denominations.create-denomination', [
            'religion' => Religion::query()->find(2),
            'religions' => Religion::all(),
        ]);
    }
}
