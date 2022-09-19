<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use Livewire\Component;

class ShowTeams extends Component
{
    public function deleteTeam($id){
        Teams::whereId($id)->delete();
        $this->teams = Teams::all();
    }

    public function render()
    {
        return view('livewire.show-teams');
    }
}
