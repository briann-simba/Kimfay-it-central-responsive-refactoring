<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;


class ContinueOnboarding extends Component
{

    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.continue-onboarding');
    }
}
