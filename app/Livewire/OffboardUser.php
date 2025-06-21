<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class OffboardUser extends Component
{

    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.offboard-user');
    }
}
