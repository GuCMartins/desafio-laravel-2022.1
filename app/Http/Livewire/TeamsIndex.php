<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use App\Models\Championships;;
use Livewire\Component;

class TeamsIndex extends Component
{

    public $showingPlayerModal = false;

    public $team;
    public $name;
    public $motherland;
    public $wins;
    public $defeats;
    public $points;

    public $isEditMode = false;

    protected $rules =[
        'name' => 'string|required',
        'motherland' => 'string|required',
        'points' => 'integer|required',
        'wins' => 'integer',
        'defeats' => 'integer',
    ];

    public function showTeamModal()
    {
        $this->reset();
        $this->showingPlayerModal = true;
    }

    public function storeTeam()
    {
        $this->validate([
            'name' => 'string|required',
            'motherland' => 'integer|required',
            'points' => 'integer|required',
            'wins' => 'integer',
            'defeats' => 'integer',
        ]);

        Teams::create([
            'name' => $this->name,
            'motherland' => $this->motherland,
            'points' => $this->points,
            'wins'=>$this->wins,
            'defeats' => $this->defeats,
        ]);
        $this->reset();
    }

    public function showEditTeamodal($id)
    {
        $this->team = Teams::findOrFail($id);
        $this->name = $this->team->name;
        $this->motherland= $this->team->motherland;
        $this->points = $this->team->points;
        $this->wins= $this->team->wins;
        $this->defeats= $this->team->defeats;
        $this->isEditMode = true;
        $this->showingPostModal = true;
    }

    public function update()
    {
        $this->player = Teams::find($this->id);

        $this->validate([
            'name' => 'string|required',
            'motherland' => 'integer|required',
            'points' => 'integer|required',
            'wins' => 'integer',
            'defeats' => 'integer',
        ]);


        $this->validade();

        $this->team->update([
            'name' => $this->name,
            'points' => $this->points,
            'motherland' => $this->motherland,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
        ]);

        session()->flash('message','Jogador atualizado com sucesso'); 
    }

    public function render()
    {
        return view('livewire.teams-index',[
            'teams' =>Teams::all(),
        ]);
    }
}
