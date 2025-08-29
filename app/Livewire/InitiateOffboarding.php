<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class InitiateOffboarding extends Component
{

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.initiate-offboarding');
    }
}
