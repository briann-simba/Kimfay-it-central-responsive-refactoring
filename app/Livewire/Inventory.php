<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Device;

class Inventory extends Component
{

    public $devices;

    public function mount()
    {
        $this->devices = Device::all();
    }


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.inventory', [
            'devices' => $this->devices,
        ]);
    }
}
