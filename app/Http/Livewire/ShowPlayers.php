<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPlayers extends Component
{
    public function render()
    {
        $players = Players::all();
        return view('livewire.show-players',compact('players'));
    }
}
