<?php

namespace App\Http\Livewire;

use App\Models\Championships;
use Livewire\Component;

class DeleteChampionship extends Component
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
        Championships::find($this->deleteId)->delete();
    }

    public function render()
    {
        return view('livewire.delete-championship');
    }
}
