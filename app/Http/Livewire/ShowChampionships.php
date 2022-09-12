<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowChampionships extends Component
{
    public function render()
    {
        $championships = Championships::all();
        return view('livewire.show-championships',compact('championships'));
    }
}
