<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use Livewire\Component;

class DataTeam extends Component
{
    public $teams;

    public function mount(){
        $this->teams = Teams::all();
    }

    public function render()
    {
        return view('livewire.data-team');
    }
}
