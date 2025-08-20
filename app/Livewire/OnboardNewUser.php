<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class OnboardNewUser extends Component
{


    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.onboard-new-user');
    }
}
