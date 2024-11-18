<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ListUser extends Component
{
    public function delete($id){
        $hotel = User::find($id);

        $hotel->delete();
        return $this->redirect('/user',navigate:true);
    }
    public function render()
    {
            return view('livewire.user.list-user',[
            'userList' => User::with(['role'])->get(),
        ]);
    }
}
