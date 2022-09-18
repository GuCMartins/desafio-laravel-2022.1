<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use Livewire\Component;

class ShowTeams extends Component
{
    public $teams;

    public function mount()
    {
        $this->teams = Teams::all();
    }

    public function deeleteTeam($id){
        Teams::whereId($id)->delete();
        $this->teams = Teams::all();
    }

    public function render()
    {
        return view('livewire.show-teams');
    }
}
