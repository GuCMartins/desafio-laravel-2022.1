<?php

namespace App\Http\Livewire;

use  Livewire\WithPagination;
use App\Models\Championships;
use Livewire\Component;

class ChampionshipIndex extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $ChampionshipDeleteModal = false;
    public $modelId;
    public $isEditMode = false;

    public $championship;
    public $name;
    public $game;
    public $begin;
    public $end;
    public $participants;

    protected $rules = [
        'name' => 'string|required',
        'game' => 'string|required',
        'begin' => 'string|required',
        'end' => 'string|required',
    ];

    public function mount()
    {
        $this->resetPage();
    }

    public function showChampionshipModal()
    {
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function createChampionshipModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function storeChampionhsip()
    {
        $this->validate([
            'name' => 'string|required',
            'game' => 'string|required',
            'begin' => 'string|required',
            'end' => 'string|required',
        ]);

        Championships::create([
            'name' => $this->name,
            'game' => $this->game,
            'begin' => $this->begin,
            'end' => $this->end,
        ]);
        $this->reset();
    }

    public function showEditChampionhsipodal($id)
    {
        $this->championhsip = Championships::findOrFail($id);
        $this->name = $this->name;
        $this->name = $this->championhsip->name;
        $this->game = $this->championhsip->game;
        $this->begin= $this->championhsip->begin;
        $this->end= $this->championhsip->end;
        $this->isEditMode = true;
        $this->showingPostModal = true;
    }


    public function updatechampionhsipModal($id)
    {
        $this->resetValidation();
        $this->reset();

        $this->modalFormVisible = true;
        $this->modelId = $id;

        $this->championhsip = Championships::find($this->modelId);

        $this->validate([
            'name' => 'string|required',
            'game' => 'integer|required',
            'begin' => 'string|required',
            'end' => 'integer',
        ]);


        $this->validade();

        $this->championhsip->update([
            'name' => $this->name,
            'game' => $this->game,
            'begin' => $this->begin,
            'end' => $this->end,
        ]);

        session()->flash('message','Campeonato atualizado com sucesso'); 
    }

    public function deleteChampionhsipModal($id)
    {
        $this->modelId = $id;
        $this->ChampionhsipDeleteModal = true;
    }

    public function deleteChampionhsip(){
        $championhsip = Championships::findOrFail($this->modelId);
        $championhsip->delete();
        $this->reset();
    }



    public function render()
    {
        return view('livewire.championship-index',[
            'championships' => Championships::all(),
        ]);
    }
}
