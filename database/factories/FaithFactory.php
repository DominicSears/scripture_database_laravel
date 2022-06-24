<?php

namespace Database\Factories;

use App\Models\Faith;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaithFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faith::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => now(),
            'religion_id' => 0,
            'denomination_id' => null,
            'start_of_faith' => $start = $this->faker->dateTimeBetween(),
            'end_of_faith' => $end = $this->faker->boolean() && $start !== now() ?
                $this->faker->dateTimeBetween($start->format('Y-m-d')) : null,
            'user_id' => 0,
            'note' => $this->faker->boolean() ? $this->faker->sentences(2) : null,
            'reason_left' => is_null($end) ? null : $this->faker->sentences(5),
        ];
    }
}
