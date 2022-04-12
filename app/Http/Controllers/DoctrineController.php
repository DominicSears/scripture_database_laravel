<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\View\View;

class DoctrineController extends Controller
{
    public function list(): View
    {
        $religions = Religion::query()
            ->with(['doctrines', 'denominations.doctrines'])
            ->whereHas('doctrines')
            ->orWhereHas('denominations.doctrines')
            ->get();

        $empty = $religions->isEmpty();

        return view('doctrines.list', [
            'religions' => $religions,
            'empty' => $empty
        ]);
    }
}
