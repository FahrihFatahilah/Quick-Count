<?php

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditCandidateList extends Component
{
    #[Title('Edit Candidates')]

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $number;

    public $photo;

    public $candidate;

    public function mount($id){
        $this->candidate = Candidate::find($id);

        $this->name = $this->candidate->name;
        $this->number = $this->candidate->number;
        $this->photo = $this->candidate->photo;


    }

    public function update(){
        $this->validate();

        $this->candidate->update($this->all());

        return $this->redirect('/candidate',navigate:true);
    }

    public function render()
    {
        return view('livewire.candidate.edit-candidate-list');
    }
}
