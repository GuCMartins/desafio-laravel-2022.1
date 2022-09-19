<?php

namespace App\Http\Livewire;

use App\Models\Championships;
use Livewire\Component;

class ShowChampionships extends Component
{
    public $championships;

    public function deleteChampionship($id){
        Championships::whereId($id)->delete();
        $this->championships = Championships::all();
    }

    public function render()
    {
        $championships = Championships::all();
        return view('livewire.show-championships');
    }
}
