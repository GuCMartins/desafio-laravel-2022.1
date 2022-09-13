<?php

namespace App\Http\Livewire;

use App\Models\Players;
use Livewire\Component;

class DeletePlayer extends Component
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
        Players::find($this->deleteId)->delete();
    }

    public function render()
    {
        return view('livewire.delete-player');
    }
}
