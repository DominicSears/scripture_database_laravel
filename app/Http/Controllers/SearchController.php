<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $validated = $request->validate([
                'q' => ['string'],
                'type' => ['nullable', 'string'],
            ]);
        } catch (ValidationException) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return view('search.results', [
            'query' => urldecode($validated['q']),
            'type' => isset($validated['type'])
                ? urldecode($validated['type'])
                : null,
        ]);
    }
}
