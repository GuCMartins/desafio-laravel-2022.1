<?php

namespace App\Http\Livewire;

use App\Models\Championships;
use Livewire\Component;

class DataChampionship extends Component
{
    public $championship;

    public function mount(Championships $championship){
        $this->championship = $championship;
    }

    public function render()
    {
        return view('livewire.data-championship');
    }
}
