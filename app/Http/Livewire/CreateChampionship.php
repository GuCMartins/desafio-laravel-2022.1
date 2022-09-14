<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use App\Models\Championships;
use Livewire\Component;

class CreateChampionship extends Component
{
    public $name;
    public $game;
    public $begin_date;
    public $end_date;
    public $participant_teams;
    public $team;

    protected $rules =[
        'name' => 'string',
        'game' => 'string',
        'begin date' => 'string',
        'end date' => 'string',
        'participant teams' => 'string',
    ];

    public function submit(){
        $this->validate();

        Championships::Create([
            'name' => $this->name,
            'game' => $this->game,
            'begin date' => $this->begin_date,
            'end date' => $this->end_date,
            'participant teams' => $this->participant_teams,
        ]);
    }

    public function render()
    {
        return view('livewire.create-championship');
    }
}
