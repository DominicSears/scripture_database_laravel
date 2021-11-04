<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctrineResource;
use App\Models\Doctrine;
class DoctrineController extends Controller
{
    public static function getDoctrine(Doctrine $doctrine)
    {
        return DoctrineResource::make($doctrine->load(['denomination', 'religion']));
    }

    public static function usersWithDoctrine(Doctrine $doctrine)
    {
        //
    }
}