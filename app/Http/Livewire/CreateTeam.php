<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use Livewire\Component;

class CreateTeam extends Component
{

    public $name;
    public $motherland;
    public $points;
    public $wins;
    public $defeats;

    protected $rules =[
        'name' => 'string',
        'motherland' => 'string',
        'points' => 'integer',
        'wins' => 'integer',
        'defeats' => 'integer',
    ];

    public function submit(){
        $this->validate();

        Teams::Create([
            'name' => $this->name,
            'motherland' => $this->motherland,
            'points' => $this->points,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
        ]);
    }

    public function render()
    {
        return view('livewire.create-team');
    }
}
