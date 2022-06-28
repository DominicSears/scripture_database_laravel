<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faith extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_of_faith' => 'datetime:Y-m-d',
        'end_of_faith' => 'datetime:Y-m-d',
    ];

    // Attributes

    public function title(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                $title = $this->religion->name;

                if (isset($this->denomination)) {
                    $title .= ' ('.$this->denomination->name.')';
                }

                return $title;
            }
        );
    }

    // Relationships

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function denomination(): HasOne
    {
        return $this->hasOne(Denomination::class, 'id', 'denomination_id');
    }

    public function religion(): HasOne
    {
        return $this->hasOne(Religion::class, 'id', 'religion_id');
    }

    // Inverse Relationships

    public function userFaith(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'faith_id');
    }

    public function allFaiths(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
