<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Device;


class PendingApproval extends Component
{

   public $devices;

    public function approveDevice($deviceId)
    {
        $this->devices = $deviceId;
        Device::where('id', $this->devices)->update(['Line_Manager_approval' => 1]);

            session()->flash('message', 'Device approved successfully.');
            $this->dispatch('$refresh'); // Refresh the devices list
       
    }


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.pending-approval', [
            'pendingDevices' => Device::where('Line_Manager_approval', 0)->paginate(5),
        ]);
    }
}
