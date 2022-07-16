<?php

namespace App\Models;

use App\Contracts\Comment\Commentable;
use App\Traits\HasComments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctrinable extends Model implements Commentable
{
    use HasFactory, HasComments;

    protected $guarded = [];

    public $timestamps = false;
}
