<?php

namespace App\Livewire\User;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Role;
use App\Models\TPS;
use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{

    public $kecamatanList;
    public $kelurahanList = [];
    public $selectedKecamatan;
    public $selectedKelurahan;

    public $username;
    public $email;
    public $password;
    public $tps;
    public $role;
    public $name;

    protected $rules = [
        'name' => 'required|string|min:3|max:50',
        'username' => 'required|string|min:3|max:50|regex:/^[a-zA-Z0-9_]+$/',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'tps' => 'required_if:role,1|integer|exists:tps,id', // Require tps only if role is '1'
        'role' => 'required|in:1,2', // Assuming 1 is admin and 2 is witness
    ];

    public function create()
    {
        $this->validate();


        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'tps_id' => $this->tps,
            'role_id' => $this->role,
        ]);

        session()->flash('message', 'User created successfully!');

        return $this->redirect('/user',navigate:true);


    }

    public function render()
    {
        return view('livewire.user.create-user',[
            'tpsList' => TPS::with(['kelurahan.kecamatan'])->get(),
            'roleList' => Role::where('id', '2')->first()
        ]);
    }
}
