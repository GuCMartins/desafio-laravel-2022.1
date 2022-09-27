<?php

namespace App\Http\Livewire;

use App\Models\Players;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Gate;

class EditlPayer extends ModalComponent
{
    public Players $player;

    public function mount(Players $player)
    {
        Gate::authorize('update', $player);
        
        $this->player = $player;
    }

    public function update()
    {
        $this->validate();
            
        $this->player->save();

        $this->closeModalWithEvents([
            PlayerIndex::getName() =>'playerUpdated',
        ]);
    }

    protected function rules(): array {
        return [
        'name' => 'string|required',
        'age' => 'integer|required',
        'nationality' => 'string|required',
        'wins' => 'integer',
        'defeats' => 'integer',
        'team' => 'integer|required',
        ];
    }

    public function render()
    {
        return view('livewire.edit-player');
    }
}