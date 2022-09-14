<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use Livewire\Component;

class ShowTeams extends Component
{

    public function render()
    {
        $teams = Teams::all();
        return view('livewire.show-teams',compact('teams'));
    }
}
