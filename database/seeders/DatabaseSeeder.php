<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        \App\Models\Teams::factory(4)->create();
        \App\Models\Players::factory(12)->create();
        \App\Models\Championships::factory(3)->create();
        \App\Models\ChampionshipTeam::factory(4)->create();
    }
}
