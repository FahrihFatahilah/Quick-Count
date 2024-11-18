<?php

namespace App\Livewire\Master\Kecamatan;

use App\Models\Kecamatan;
use Livewire\Component;

class CreateKecamatan extends Component
{
    public $name;
    protected $rules = [
        'name' => 'required|string|max:255',
    ];


    public function render()
    {
        return view('livewire.master.kecamatan.create-kecamatan');
    }

    public function create(){
        Kecamatan::create($this->all());
        return $this->redirect('/kecamatan',navigate:true);
    }

}
