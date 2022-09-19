<?php

namespace App\Http\Livewire;

use App\Models\Championships;
use Livewire\Component;

class DataChampionship extends Component
{
    public $championships;

    public function mount(){
        $this->championships = Championships::all();
    }

    public function render()
    {
        return view('livewire.data-championship');
    }
}
