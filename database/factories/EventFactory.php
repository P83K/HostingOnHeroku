<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'detail' => fake()->text(),
            'begin' => fake()->date(),
            'end' => fake()->date(),
            'category' => fake()->text(),
            'graphics' =>('1730911706.png') ,
        ];
    }
}
