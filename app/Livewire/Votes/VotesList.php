<?php

namespace App\Livewire\Votes;

use App\Models\Candidate;
use App\Models\VotesResults;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class VotesList extends Component
{
    #[Title('List Votes')]

    public $search;

    // public function render()
    // {

    //     return view('livewire.votes.votes-list',[
    //         'voteList' => VotesResults::with(['candidate', 'tps', 'user'])
    //         ->whereHas('candidate', function ($query) {
    //             $query->where('name', 'LIKE', '%' . $this->search . '%');
    //         })
    //         ->orWhereHas('tps', function ($query) {
    //             $query->where('location_name', 'LIKE', '%' . $this->search . '%');
    //         })
    //         ->get()
    //     ]);
    // }


    public function render()
    {

        $voteData = VotesResults::selectRaw('candidate_id, SUM(vote_count) as total_votes')
            ->groupBy('candidate_id')
            ->with('candidate')
            ->when(Auth::user()->tps_id, function ($query) {
                return $query->where('tps_id', Auth::user()->tps_id); // Filter by tps_id if it's not null
            })->get();

        $voteList = VotesResults::with(['candidate', 'tps', 'user'])
            ->when(Auth::user()->tps_id, function ($query) {
                // Only filter by tps_id
                return $query->where('tps_id', Auth::user()->tps_id);
            })
            ->get();

        return view('livewire.votes.votes-list  ', [
            'candidateList' => Candidate::where('name', 'LIKE', '%' . $this->search . '%'),
            'voteData' => $voteData,
            'voteList' => $voteList,
            'candidateList' => Candidate::where('name','LIKE','%'.$this->search.'%')
        ]);
    }
}
