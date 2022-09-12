<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditTeam extends Component
{
    public $name;
    public $motherland;
    public $points;
    public $wins;
    public $defeats;

    protected $rules =[
        'name' => 'string|required',
        'motherland' => 'string|required',
        'points' => 'integer',
        'wins' => 'integer',
        'defeats' => 'integer',
        'team' => 'string|required',
    ];

    public function mount(Teams $team)
    {
        $this->name = $team->name;
        $this->motherland = $team->motherland;
        $this->points = $team->points;
        $this->wins = $team->wins;
        $this->defeats = $team->defeats;
    }

    public function update()
    {
        $team = Teams::find($this->id);

        $this->validade();

        $team->update([
            'name' => $this->name,
            'motherland' => $this->motherland,
            'points' => $this->points,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
            'team' => $this->team,
        ]);

        session()->flash('team','Time atualizado com suceso'); 
    }

    public function render()
    {
        return view('livewire.edit-team');
    }
}
