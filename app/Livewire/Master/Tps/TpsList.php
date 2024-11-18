<?php

namespace App\Livewire\Master\Tps;

use App\Models\TPS;
use Livewire\Component;

class TpsList extends Component
{
    public function render()
    {
        return view('livewire.master.tps.tps-list', [
            'tpsList' => TPS::with(['kelurahan.kecamatan'])->get(),
        ]);
    }
}
