<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Attributes\Layout;

class Welcome extends Component
{

 public $email="";
 public $password="";
 public $remember = false;


    // public function login(){
    //     $user = User::where('email', $this->email)->first();

     

    //     if (!$user || $user->password !== $this->password){
    //         $this->addError('email', 'Wrong username or password');
    //         return;
           
    //     }else{
    //         Auth::login($user);
    //         session()->regenerate();

    //         return redirect()->intended('/dashboard');
    //     }
    // }
    public function login(){

        $credentials=[
            'email'=>$this->email,
            'password'=>$this->password,
        ];

        if(Auth::Attempt($credentials, $this->remember)){
            session()->regenerate();

            // dd($this->remember);
            return redirect()->intended('/dashboard');
        }
        else {
            // Authentication failed
            $this->addError('email', 'Invalid email or password.');
        }
    }


    #[layout('layouts.auth')]
    public function render()
    {
        return view('livewire.welcome');
    }
}
