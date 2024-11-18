<?php

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCandidateList extends Component
{
    #[Title('Create Candidates')]

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $number;

    public $photo;

    use WithFileUploads;
    public function render()
    {
        return view('livewire.candidate.create-candidate-list');
    }
    public function create(){
        $this->validate([
            'number' => 'required|numeric', // Validate number field
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the uploaded image
        ]);
        $data = [
            'name' => $this->name,
            'number' => $this->number,
        ];

        if ($this->photo) {
            try {
                $photoPath = $this->photo->store('photos', 'public');

                $base64Photo = base64_encode(file_get_contents(storage_path('app/public/' . $photoPath)));

                $data['photo'] = $base64Photo;
            } catch (Exception $e) {
                Log::error("Error while processing photo: " . $e->getMessage());

                session()->flash('error', 'An error occurred while processing the photo. Candidate created without photo.');
            }
        }

        // Create the candidate with the data (photo or not)
        Candidate::create($data);

        return $this->redirect('/candidate',navigate:true);
    }
}
