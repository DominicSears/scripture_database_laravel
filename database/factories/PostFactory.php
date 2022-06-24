<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    protected const POSTABLE_TYPES = [
        'App\Models\User',
        'App\Models\Doctrine',
        'App\Models\Denomination',
        'App\Models\Religion',
        'App\Models\Nugget',
    ];

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
            'published_at' => $this->faker->boolean() ? $this->faker->dateTimeBetween() : null,
            'postable_type' => $type = self::POSTABLE_TYPES[rand(0, count(self::POSTABLE_TYPES) - 1)],
            'postable_id' => 0,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->words(rand(1, 4), true),
            'content' => $this->faker->randomHtml(),
        ];
    }
}
