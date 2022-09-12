<?php

namespace App\Http\Livewire;

use App\Models\Players;
use Livewire\Component;

class CreatePlayer extends Component
{
    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $defeats;
    public $team;

    protected $rules =[
        'name' => 'string|required',
        'age' => 'integer',
        'nationality' => 'string|required',
        'wins' => 'integer',
        'defeats' => 'integer',
        'team' => 'string|required',
    ];

    public function submit(){
        $this->validate();

        Players::Create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
            'team' => $this->team,
        ]);
    }

    public function render()
    {
        return view('livewire.create-player');
    }
}
