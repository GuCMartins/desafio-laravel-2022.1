<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeamsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $var = rand(0,10);
        return [
            'name'=> fake()->text(5),
            'motherland' => fake()->country(),
            'points' => rand(0,30),
            'wins' => $var,
            'defeats' => 10 - $var,
        ];
    }
}
