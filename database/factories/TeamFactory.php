<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeamFactory extends Factory
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
            'motherland' => fake()->country(),
            'points' => rand(0,30),
            'wins' => rand(0,10),
            'defeats' => 10 - 'wins',
            'players' =>[null],
            'championships' => [null],
        ];
    }
}
