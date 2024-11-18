<?php

namespace App\Livewire\Candidate;

use Livewire\Attributes\Title;
use Livewire\Component;

class ViewCandidateList extends Component
{
    #[Title('View Candidates')]

    public function render()
    {
        return view('livewire.candidate.view-candidate-list');
    }
}
