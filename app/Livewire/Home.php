<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Home extends Component
{

  

    

    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.home');
}
}
