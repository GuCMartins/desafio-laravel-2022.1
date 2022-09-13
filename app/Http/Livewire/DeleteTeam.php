<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use Livewire\Component;

class DeleteTeam extends Component
{
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete()
    {
        Teams::find($this->deleteId)->delete();
    }

    public function render()
    {
        return view('livewire.delete-team');
    }
}
