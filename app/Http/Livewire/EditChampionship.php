<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditChampionship extends Component
{
    public $name;
    public $game;
    public $begin_date;
    public $end_date;
    public $participant;

    protected $rules =[
        'name' => 'string|required',
        'game' => 'string|required',
        'begin date' => 'string|required',
        'end date' => 'string',
        'participant teams' => 'string|required',
        'team' => 'string|required',
    ];

    public function mount(Teams $team)
    {
        $this->name = $team->name;
        $this->game = $team->game;
        $this->begin_date = $team->begin_date;
        $this->end_date = $team->end_date;
        $this->participant = $team->participant;
    }

    public function update()
    {
        $team = Teams::find($this->id);

        $this->validade();

        $team->update([
            'name' => $this->name,
            'game' => $this->game,
            'begin date' => $this->begin_date,
            'end date' => $this->end_date,
            'participant teams' => $this->p,
            'team' => $this->team,
        ]);

        session()->flash('team','Campeonato atualizado com suceso'); 
    }

    public function render()
    {
        return view('livewire.edit-championship');
    }
}
