<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class DenominationController extends Controller
{
    public function createDenomination()
    {
        return view('denominations.create-denomination', [
            'religion' => Religion::query()->find(2),
            'religions' => Religion::all()
        ]);
    }
}
