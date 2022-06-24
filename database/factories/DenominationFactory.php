<?php

namespace Database\Factories;

use App\Models\Denomination;
use Illuminate\Database\Eloquent\Factories\Factory;

class DenominationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Denomination::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => now(),
            'created_by' => 0,
            'religion_id' => 0,
            'parent_id' => null,
            'approved' => true,
        ];
    }
}
