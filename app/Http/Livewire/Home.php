<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function ToPlayers(){

        return $this->redirectRoute('players');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
