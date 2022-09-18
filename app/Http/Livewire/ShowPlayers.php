<?php

namespace App\Http\Livewire;

use App\Models\Players;
use Livewire\Component;

class ShowPlayers extends Component
{
    public $players;

    public function mount(){
        $this->players = Players::all();
    }

    public function deeletePlayer($id){
        players::whereId($id)->delete();
        $this->player = Players::all();
    }

    public function render()
    {
        $players = Players::all();
        return view('livewire.show-players');
    }
}
