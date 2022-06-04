<?php

namespace App\Http\Controllers;

use App\Models\Nugget;
use Illuminate\Http\Request;

class NuggetController extends Controller
{
    public function list()
    {
        return view('nuggets.list', [
            'nuggets' => Nugget::all()
        ]);
    }
}
