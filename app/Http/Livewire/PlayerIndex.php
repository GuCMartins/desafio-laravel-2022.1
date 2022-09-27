<?php

namespace App\Http\Livewire;

use  Livewire\WithPagination;
use App\Models\Players;
use App\Models\Teams;
use Livewire\Component;

class PlayerIndex extends Component
{
    use WithPagination;

    public $listeners = ['playerUpdated'=>'render'];

    public $player;
    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $defeats;
    public $team_id;

    protected $rules =[
        'name' => 'string|required',
        'age' => 'integer|required',
        'nationality' => 'string|required',
        'wins' => 'integer',
        'defeats' => 'integer',
        'team' => 'integer|required',
    ];

    public function mount(){
        $this->resetPage();
    }

    private function resetInputFields(){
        $this->name = '';
        $this->age = '';
        $this->nationality = '';
        $this->wins = '';
        $this->defeats = '';
        $this->team = '';
    }

    public function showPlayerModal()
    {
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function createPlayerModal(){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function storePlayer()
    {
        $this->validate([
            'name' => 'string|required',
            'age' => 'integer|required',
            'nationality' => 'string|required',
            'wins' => 'integer',
            'defeats' => 'integer',
            'team_id' => 'integer|required',
        ]);

        Players::create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins'=>$this->wins,
            'defeats' => $this->defeats,
            'team_id' => $this->team_id,
        ]);
        $this->reset();
    }

    public function showEditPlayerodal($id)
    {
        $this->player = Players::findOrFail($id);
        $this->name = $this->name;
        $this->name = $this->player->name;
        $this->age = $this->player->age;
        $this->nationality= $this->player->nationality;
        $this->wins= $this->player->wins;
        $this->defeats= $this->player->defeats;
        $this->team_id= $this->player->team_id;
        $this->isEditMode = true;
        $this->showingPostModal = true;
    }


    public function updatePlayerModal($id)
    {
        $this->resetValidation();
        $this->reset();

        $this->player = Players::find($id);

        $this->validate([
            'name' => 'string|required',
            'age' => 'integer|required',
            'nationality' => 'string|required',
            'wins' => 'integer',
            'defeats' => 'integer',
            'team_id' => 'integer|required',
        ]);


        $this->validade();

        $this->player->update([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
            'team_id' => $this->team_id,
        ]);

        session()->flash('message','Jogador atualizado com sucesso'); 
    }

    public function deletePlayer($id){
        $player = Players::findOrFail($id);
        $player->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.players-index', [
            'players' => Players::all(),
            'teams' =>Teams::all(),
        ]);
    }
}