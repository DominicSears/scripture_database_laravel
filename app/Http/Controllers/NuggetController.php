<?php

namespace App\Http\Controllers;

use App\Models\Nugget;

class NuggetController extends Controller
{
    public function list()
    {
        $nuggets = Nugget::with(['religions', 'denominations', 'doctrines', 'nuggetable'])->get();

        return view('nuggets.list', [
            'nuggets' => $nuggets,
        ]);
    }
}
