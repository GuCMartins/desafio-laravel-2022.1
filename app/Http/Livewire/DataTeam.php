<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use Livewire\Component;

class DataTeam extends Component
{
    public $team;

    public function mount(Teams $team){
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.data-team');
    }
}
