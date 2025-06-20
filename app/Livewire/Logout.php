<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

   public $show = false;

    protected $listeners = ['onOpenLogoutModal' => 'open'];

    public function open()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }


    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
    
        session()->flash('message', 'You have been logged out successfully.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
