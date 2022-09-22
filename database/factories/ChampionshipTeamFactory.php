<?php

namespace Database\Factories;

use App\Models\Teams;
use App\Models\Championships;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChampionshipTeams>
 */
class ChampionshipTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'championship_id'=> Teams::inRandomOrder()->first()->id,
            'team_id'=> Championships::inRandomOrder()->first()->id,
        ];
    }
}
