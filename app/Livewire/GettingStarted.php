<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class GettingStarted extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.getting-started');
    }
}
