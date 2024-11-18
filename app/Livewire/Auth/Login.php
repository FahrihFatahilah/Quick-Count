<?php

namespace App\Livewire\Auth;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{

    #[Layout('components.layouts.auth')]
    #[Title('Login')]

    public $email = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            // Retrieve the logged-in user's role_id
            $user = Auth::user();
            $role = Role::find($user->role_id); // Retrieve the Role by role_id

            // Store the role name (or any other property) in the session
            session(['user_role' => $role->name]);

            // Flash a success message
            session()->flash('message', 'Login successful.');

            // Redirect to the intended page or dashboard
            return redirect()->intended('/dashboard');
        } else {
            // Flash an error message if login failed
            session()->flash('error', 'Invalid email or password.');
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
