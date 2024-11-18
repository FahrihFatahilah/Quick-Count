<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Component;
use App\Models\VotesResults;

class Dashboard extends Component
{
    public $search;

    public function refreshChart()
    {
        // Fetch vote data and related candidate information
        $voteData = VotesResults::selectRaw('candidate_id, SUM(vote_count) as total_votes')
            ->groupBy('candidate_id')
            ->with('candidate')
            ->get();

        // Emit updated voteData to JavaScript
        $this->emit('chartDataUpdated', $voteData);
    }

    public function render()
    {
        // Fetch vote data for initial view
        $voteData = VotesResults::selectRaw('candidate_id, SUM(vote_count) as total_votes')
            ->groupBy('candidate_id')
            ->with('candidate')
            ->get();

        // Return the view with necessary data
        return view('livewire.dashboard', [
            'candidateList' => Candidate::where('name', 'LIKE', '%' . $this->search . '%')->paginate(10),
            'voteData' => $voteData,
            'voteList' => VotesResults::with(['candidate', 'tps', 'user'])
                ->where(function ($query) {
                    $query->whereHas('candidate', function ($subQuery) {
                        $subQuery->where('name', 'LIKE', '%' . $this->search . '%');
                    })
                    ->orWhereHas('tps', function ($subQuery) {
                        $subQuery->where('location_name', 'LIKE', '%' . $this->search . '%');
                    });
                })
                ->orderBy('created_at', 'desc') // Sorting by created_at (ascending)
                ->get(),
        ]);
    }
}
