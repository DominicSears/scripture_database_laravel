<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scripture extends Model
{
    public const BIBLE_VERSIONS = [
      'kjv', 'asv', 'bbe', 'web', 'ylt'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (in_array($attributes['bible_version'] ?? 'kjv', self::BIBLE_VERSIONS)) {
            $this->table = 'scriptures_'.$attributes['bible_version'];
        }
    }
}
