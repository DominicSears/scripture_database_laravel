<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class DoctrineController extends Controller
{
    public function list()
    {
        $relationships = ['doctrine', /*'denominations.doctrine'*/];

        $religions = Religion::query()
            ->with($relationships)
            ->get();
        
        return view('doctrines.list', [
            'religions' => $religions
        ]);
    }
}
