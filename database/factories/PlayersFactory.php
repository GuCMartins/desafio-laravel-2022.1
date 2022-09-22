<?php

namespace Database\Factories;

use App\Models\Teams;
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
            'age'=> rand(16,60),
            'nationality'=> fake()->country(),
            'wins' => rand(0,30),
            'defeats' => rand(0,30),
            'team_id' => Teams::inRandomOrder()->first()->id,
        ];
    }
}
