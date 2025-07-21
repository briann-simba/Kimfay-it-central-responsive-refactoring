<?php

namespace App\Livewire\Modals;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class EditDevice extends ModalComponent
{

     public Device $device;

    protected $rules = [
        'device.name' => 'required|string|max:255',
        'device.color' => 'required|string|max:50',
        'device.category' => 'required|string|max:50',
        'device.value' => 'required|numeric|min:0',
    ];

    protected $listeners = ['openEditModal'];

    public bool $showModal = false;

    public function openEditModal(Device $device)
    {
        $this->device = $device;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();
        $this->device->save();

        $this->dispatch('refresh-table'); // Let parent refresh
        $this->dispatch('closeEditModal');
        session()->flash('message', 'Device updated successfully.');
    }


    public function render()
    {
        return view('livewire.modals.edit-device');
    }
}
