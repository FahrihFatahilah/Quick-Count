<?php

namespace App\Livewire\Master\Desa;

use Livewire\Component;

class ListDesa extends Component
{
    #[Title('Data Desa')]

    public function render()
    {
        return view('livewire.master.desa.list-desa');
    }
}
