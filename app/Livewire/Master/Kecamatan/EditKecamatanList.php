<?php

namespace App\Livewire\Master\Kecamatan;

use App\Models\Kecamatan;
use Livewire\Component;

class EditKecamatanList extends Component
{

    public $name;
    public $kecamatan;
    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($id)
    {



        $this->kecamatan = Kecamatan::find($id);

        $this->name = $this->kecamatan->name;

    }

    public function update(){
        $this->validate();

        $this->kecamatan->update($this->all());

        return $this->redirect('/kecamatan',navigate:true);
    }

    public function render()
    {
        return view('livewire.master.kecamatan.edit-kecamatan-list');
    }
}
