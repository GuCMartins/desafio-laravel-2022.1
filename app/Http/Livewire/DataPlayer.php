<?php

namespace App\Http\Livewire;

use App\Models\Players;
use Livewire\Component;

class DataPlayer extends Component
{
    public $players;

    public function mount(){
        $this->players = Players::all();
    }

    public function render()
    {
        return view('livewire.data-player');
    }
}
