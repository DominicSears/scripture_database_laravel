<?php

namespace App\Http\Controllers;

use App\Models\Nugget;
use Illuminate\Http\Request;

class NuggetController extends Controller
{
    public function list()
    {
        $nuggets = Nugget::with(['religions', 'denominations', 'doctrines'])->get();

        return view('nuggets.list', [
            'nuggets' => $nuggets
        ]);
    }
}
