<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
    
        session()->flash('message', 'You have been logged out successfully.');
        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
