<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Attributes\Layout;

class Login extends Component
{

 public $email="";
 public $password="";
 public $remember = false;


    public function mount()
{
    if (auth()->check()) {
        return redirect()->to('/home'); // or your home route e.g. '/dashboard'
    }
}

    public function login(){

        $credentials=[
            'email'=>$this->email,
            'password'=>$this->password,
        ];

        if(Auth::Attempt($credentials, $this->remember)){
            session()->regenerate();

            // dd($this->remember);
            return redirect()->intended('/home');
        }
        else {
            // Authentication failed
            $this->addError('email', 'Invalid email or password.');
        }
    }

    #[layout('layouts.auth')]
    public function render()
    {
        return view('livewire.login');
    }
}
