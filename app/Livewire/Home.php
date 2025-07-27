<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Device;

class Home extends Component
{


public $deviceId;

public function acceptDevice($deviceId)
{
    $this->deviceId = $deviceId;
    Device::where('id', $this->deviceId)->update(['User_Accepted' => 1]);


      session()->flash('notify', [
        'type' => 'success',
        'title' => 'Device Accepted',
        'message' => 'Device accepted successfully.'
    ]);


    return redirect()->route('home');
}


    

    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.home');
}
}
