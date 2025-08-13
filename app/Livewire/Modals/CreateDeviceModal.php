<?php

namespace App\Livewire\Modals;
use LivewireUI\Modal\ModalComponent;

use Livewire\Component;

class CreateDeviceModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.create-device-modal');
    }
}
