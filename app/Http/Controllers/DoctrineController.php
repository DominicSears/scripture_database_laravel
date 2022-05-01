<?php

namespace App\Http\Controllers;

use App\Models\Denomination;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DoctrineController extends Controller
{
    /**
     * Create a doctrinen for type
     *
     * @param Request $request
     * @throws NotFoundHttpException
     * @return View
     */
    public function create(Request $request): View
    {
        /** @var class-string $entityType */
        $entityType = $this->getEntityType($request->get('type'));

        return view('doctrines.create', [
            'entityType' => $entityType,
            'entityId' => $request->get('id')
        ]);
    }

    /**
     * Get type from request and throw error if needed
     *
     * @param ?string $type
     * @throws NotFoundHttpException
     * @return string
     */
    protected function getEntityType(?string $type): string
    {
        return match($type) {
            'religion' => Religion::class,
            'denomination' => Denomination::class,
            default => throw new NotFoundHttpException()
        };
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
            'empty' => $empty
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
            'denominationEmpty' => $denominationEmpty
        ]);
    }

    public function byDenomination(Denomination $denomination): View
    {
        $denomination->load('doctrines');

        $empty = $denomination->doctrines->isEmpty();

        return view('doctrines.by-denomination', [
            'denomination' => $denomination,
            'empty' => $empty
        ]);
    }
}
