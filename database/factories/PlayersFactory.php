<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Players>
 */
class PlayersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> fake()->text(5),
            'age'=> fake()->rand(16,65),
            'nationality'=> fake()->country(),
            'wins' =>fake()->rand(0,30),
            'defeats' => fake()->rand(0,30),
            'team' => null,
        ];
    }
}
