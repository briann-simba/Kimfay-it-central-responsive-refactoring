<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ManageUser extends Component
{


    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.manage-user');
    }
}
