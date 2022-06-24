<?php

namespace App\Http\Controllers;

use App\Models\Denomination;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DoctrineController extends Controller
{
    public function create(Request $request): View
    {
        $validator = validator(
            $request->all(),
            [
                'denomination_id' => ['integer', 'nullable'],
                'religion_id' => ['integer', 'nullable'],
            ]
        );

        try {
            $values = $validator->validate();
        } catch (ValidationException) {
            throw new NotFoundHttpException();
        }

        return view('doctrines.create', [
            'religion_id' => $values['religion_id'] ?? null,
            'denomination_id' => $values['denomination_id'] ?? null,
        ]);
    }

    public function list(): View
    {
        $religions = Religion::query()
            ->scopes(['active'])
            ->with(['doctrines', 'denominations.doctrines'])
            ->whereHas('doctrines')
            ->orWhereHas('denominations.doctrines')
            ->get();

        $empty = $religions->isEmpty();

        return view('doctrines.list', [
            'religions' => $religions,
            'empty' => $empty,
        ]);
    }

    public function byReligion(Religion $religion): View
    {
        $religion->load(['doctrines', 'denominations.doctrines']);

        $empty = $religion->doctrines->isEmpty();

        $denominationEmpty = true;

        foreach ($religion->denominations as $denomination) {
            // Just set the variable once
            if ($denomination->doctrines->isNotEmpty()) {
                $denominationEmpty = false;

                break;
            }
        }

        return view('doctrines.by-religion', [
            'religion' => $religion,
            'empty' => $empty,
            'denominationEmpty' => $denominationEmpty,
        ]);
    }

    public function byDenomination(Denomination $denomination): View
    {
        $denomination->load('doctrines');

        $empty = $denomination->doctrines->isEmpty();

        return view('doctrines.by-denomination', [
            'denomination' => $denomination,
            'empty' => $empty,
        ]);
    }
}
