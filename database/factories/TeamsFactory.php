<?php

namespace Database\Factories;

use App\Models\Players;
use App\Models\Championships;
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
        $name = fake()->text(5);
        $count = 0;
        $players = Players::all();
        $members = array();
        foreach ( $players as $player){
            if ($player->team == null && $count<4){
                $player->team = $name;
                $count = $count + 1;
                array_push($members, $player->id);
            }
        }

        $var = rand(0,10);
        return [
            'name'=> $name,
            'motherland' => fake()->country(),
            'points' => rand(0,30),
            'wins' => $var,
            'defeats' => 10 - $var,
            'players_id' => $members,
        ];
    }
}
