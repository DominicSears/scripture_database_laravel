<?php

namespace Database\Factories;

use App\Models\Doctrine;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctrineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctrine::class;

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
            'description' => $this->faker->sentence(rand(3, 20)),
            'scriptures' => [rand(01_001_001, 66_022_021)],
            'religion_id' => 0,
            'denomination_id' => null
        ];
    }
}
