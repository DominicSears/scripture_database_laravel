<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class DoctrineController extends Controller
{
    public function list()
    {
        $religions = Religion::query()
            ->with(['doctrines', 'denominations.doctrines'])
            ->get();
        
        return view('doctrines.list', [
            'religions' => $religions
        ]);
    }
}
