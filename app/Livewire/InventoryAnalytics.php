<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class InventoryAnalytics extends Component
{

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.inventory-analytics');
    }
}
