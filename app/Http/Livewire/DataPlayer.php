<?php

namespace App\Http\Livewire;

use App\Models\Players;
use Livewire\Component;

class DataPlayer extends Component
{
    public $player;

    public function mount(Players $player){
        $this->player = $player;
    }

    public function render()
    {
        return view('livewire.data-player');
    }
}
