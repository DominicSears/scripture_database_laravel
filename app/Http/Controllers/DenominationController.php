<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use App\Models\Denomination;

class DenominationController extends Controller
{
    public function createDenomination()
    {
        return view('denominations.create-denomination', [
            'religion' => Religion::query()->find(2),
            'religions' => Religion::all(),
        ]);
    }

    public function show(Denomination $denomination)
    {
        $denomination->load([
            'religion',
            'doctrines' => [
                'createdBy' => [
                    'faith' => [
                        'denomination',
                        'religion',
                    ],
                ],
                'nuggets'
            ],
        ]);

        return view('denominations.show', [
            'denomination' => $denomination,
        ]);
    }
}
