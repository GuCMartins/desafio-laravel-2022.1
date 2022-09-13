<?php

namespace App\Http\Livewire;

use App\Models\Championships;
use Livewire\WithPagination;
use Livewire\Component;

class DashboardChampionship extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField;
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.dashboard-championship', [
            'championship' => Championships::search('name', $this->search)->orderBy($this->sortField, $this->sortDiretion),
        ]);
    }
}
