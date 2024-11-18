<?php

namespace App\Livewire\Master\Kecamatan;

use App\Models\Kecamatan;
use Livewire\Component;

class KecamatanList extends Component
{
    public function render()
    {
        return view('livewire.master.kecamatan.kecamatan-list',[
            'kecamatanList' => Kecamatan::all()
        ]);
    }
    public function delete($id){
        $hotel = Kecamatan::find($id);

        $hotel->delete();
        return $this->redirect('/kecamatan',navigate:true);
    }
}
