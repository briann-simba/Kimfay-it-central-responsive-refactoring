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

   public $devices;
   public $user;
   public $DeviceToApprove;

    public function approveDevice($deviceId)
    {
        $this->devices = $deviceId;
        $this->DeviceToApprove = Device::find($this->devices);
        Device::where('id', $this->devices)->update(['Line_Manager_approval' => 1]);
        $this->user = User::where('id', $this->DeviceToApprove->user_id)->first();

        //send email notification
        Mail::to($this->user->email)->send(new DeviceApproved(['device' => $this->DeviceToApprove,
        'user' => $this->user]));

            $this->dispatch('notify', 
                type: 'success',
                title: 'Device Approved',
                message: "Device Approved successfully."
            );

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
