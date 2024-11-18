<?php

namespace App\Livewire\Master\Tps;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\TPS;
use Livewire\Component;

class TpsCreate extends Component
{

    public $kecamatanList;
    public $kelurahanList = [];
    public $selectedKecamatan;
    public $selectedKelurahan;
    public $name; // Name of the TPS or Kelurahan input


    public function mount()
    {
        // Load all Kecamatan initially
        $this->kecamatanList = Kecamatan::all(['id', 'name']);
    }

    // Method to load Kecamatan when Kelurahan is selected
    public function loadKecamatan()
    {
        // Check if a Kelurahan is selected and load Kecamatan
        if ($this->selectedKelurahan) {
            $this->kecamatanList = Kecamatan::where('kelurahan_id', $this->selectedKelurahan)->get(['id', 'name']);
        } else {
            // Load all Kecamatan initially if no Kelurahan is selected
            $this->kecamatanList = Kecamatan::all(['id', 'name']);
        }

        // Reset the selected Kelurahan when Kecamatan is changed
        $this->selectedKelurahan = null;
    }

    // Reset Kelurahan and load based on selected Kecamatan
    public function loadKelurahan()
    {
        // Check if a Kecamatan is selected and load Kelurahan based on it
        if ($this->selectedKecamatan) {
            $this->kelurahanList = Kelurahan::where('kecamatan_id', $this->selectedKecamatan)->get(['id', 'name']);
        } else {
            // Reset Kelurahan list if no Kecamatan is selected
            $this->kelurahanList = [];
        }

        // Reset Kelurahan selection when Kecamatan changes
        $this->selectedKelurahan = null;
    }

    public function create()
    {
        // Validation
        $this->validate([
            'name' => 'required|string|max:255',
            'selectedKecamatan' => 'required',
            'selectedKelurahan' => 'required',
        ]);

        // Save the data (adjust as per your database structure)
        TPS::create([
            'location_name' => $this->name,
            'kecamatan_id' => $this->selectedKecamatan,
            'kelurahan_id' => $this->selectedKelurahan,
        ]);

        // Reset inputs and show success message
        $this->reset(['name', 'selectedKecamatan', 'selectedKelurahan', 'kelurahanList']);
        session()->flash('success', 'Kelurahan inserted successfully!');
        return $this->redirect('/tps',navigate:true);

    }

    public function render()
    {
        return view('livewire.master.tps.tps-create');
    }
}
