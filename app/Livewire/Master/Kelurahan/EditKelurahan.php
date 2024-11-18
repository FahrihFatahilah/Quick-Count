<?php

namespace App\Livewire\Master\Kelurahan;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Livewire\Component;

class EditKelurahan extends Component
{

    public $kecamatanList = []; // List of Kecamatan
    public $kecamatanId = null; // Selected Kecamatan ID
    public $name = ''; // Name of the Kelurahan

    public $kelurahan;

    protected $rules = [
        'kecamatanId' => 'required|exists:kecamatan,id',
        'name' => 'required|string|max:255',
    ];

    public function mount($id)
    {

        $this->kecamatanList = Kecamatan::all(['id', 'name']);

        $this->kecamatanList = Kecamatan::all(['id', 'name']);

        $this->kelurahan = Kelurahan::find($id);

        $this->name = $this->kelurahan->name;
        $this->kecamatanId = $this->kelurahan->kecamatan_id;


    }

    public function render()
    {
        return view('livewire.master.kelurahan.edit-kelurahan');
    }
}
