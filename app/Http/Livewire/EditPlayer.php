<?php

namespace App\Http\Livewire;

use App\Models\Players;
use App\Models\Teams;
use Livewire\Component;

class EditPlayer extends Component
{

    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $defeats;
    public $team;

    protected $rules =[
        'name' => 'string|required',
        'age' => 'integer|required',
        'nationality' => 'string|required',
        'wins' => 'integer',
        'defeats' => 'integer',
        'team' => 'string|required',
    ];

    public function mount(Players $player)
    {
        $this->name = $player->name;
        $this->age = $player->age;
        $this->nationality = $player->nationality;
        $this->wins = $player->wins;
        $this->defeats = $player->defeats;
        $this->team = $player->team;
    }

    public function update()
    {
        $player = Players::find($this->id);

        $this->validade();

        $player->update([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
            'team' => $this->team,
        ]);

        session()->flash('message','Jogador atualizado com suceso'); 
    }

    public function render()
    {
        return view('livewire.edit-player')->layout('layouts.master');
    }
}