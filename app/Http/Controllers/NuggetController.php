<?php

namespace App\Http\Controllers;

use App\Models\Nugget;
use Illuminate\Http\Request;

class NuggetController extends Controller
{
    public function all()
    {
        return view('nuggets.index', [
            'nuggets' => Nugget::all()
        ]);
    }
}
