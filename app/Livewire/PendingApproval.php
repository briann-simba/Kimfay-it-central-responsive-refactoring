<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Device;
use App\Mail\DeviceApproved;
use Illuminate\Support\Facades\Mail;

class PendingApproval extends Component
{
    use WithPagination;

    public function approveDevice($deviceId)
    {
        $device = Device::findOrFail($deviceId);
        $device->update(['line_manager_approval' => 1]);
        
        $user = User::find($device->user_id);
        
        // Send email notification
        Mail::to($user->email)->send(new DeviceApproved([
            'device' => $device,
            'user' => $user
        ]));

        $this->dispatch('notify', 
            type: 'success',
            title: 'Device Approved',
            message: "Device Approved successfully."
        );
    }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.pending-approval', [
            'pendingDevices' => Device::where('line_manager_approval', 0)
                                     ->orderBy('created_at', 'desc')
                                     ->paginate(5),
        ]);
    }
}