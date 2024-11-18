<?php

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Component;

class CandidateList extends Component
{
    #[Title('List Paslon')]

    public $search;

    public function render()
    {

        return view('livewire.candidate.candidate-list',[
            'candidateList' => Candidate::where('name','LIKE','%'.$this->search.'%')->get()
        ]);
    }

    public function delete($id){
        $hotel = Candidate::find($id);

        $hotel->delete();
        return $this->redirect('/candidate',navigate:true);
    }
}
