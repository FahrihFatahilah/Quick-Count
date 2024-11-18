<?php

namespace App\Livewire\Master\Kelurahan;

use App\Models\Kelurahan;
use Livewire\Component;

class KelurahanList extends Component
{
    public function render()
    {
        return view('livewire.master.kelurahan.kelurahan-list',[
            'kelurahanList' => Kelurahan::with('kecamatan')->get()
        ]);
    }

    public function delete($id){
        $hotel = Kelurahan::find($id);

        $hotel->delete();
        return $this->redirect('/kelurahan',navigate:true);
    }
}
