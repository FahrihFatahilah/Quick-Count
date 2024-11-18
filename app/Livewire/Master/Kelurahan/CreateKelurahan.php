<?php

namespace App\Livewire\Master\Kelurahan;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Livewire\Component;

class CreateKelurahan extends Component
{
    public $kecamatanList = []; // List of Kecamatan
    public $kecamatanId = null; // Selected Kecamatan ID
    public $name = ''; // Name of the Kelurahan

    protected $rules = [
        'kecamatanId' => 'required|exists:kecamatan,id',
        'name' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->kecamatanList = Kecamatan::all(['id', 'name']);

    }

    public function save()
    {
        // Validate input
        $this->validate([
            'kecamatanId' => 'required|exists:kecamatan,id',
            'name' => 'required|string|max:255',
        ]);

        // Kelurahan::create([
        //     'name' => $this->name,
        //     'kecamatan_id' => $this->selectedKecamatan,
        // ]);

        // Reset fields and provide feedback
        $this->reset(['kecamatanId', 'name']);
        session()->flash('message', 'Kelurahan created successfully!');
    }

    public function create(){
        $this->validate();
        $data = $this->all();
        $data['kecamatan_id'] = $this->kecamatanId;

        Kelurahan::create($data);

        return $this->redirect('/kelurahan',navigate:true);
    }

    public function render()
    {
        return view('livewire.master.kelurahan.create-kelurahan');
    }
}
