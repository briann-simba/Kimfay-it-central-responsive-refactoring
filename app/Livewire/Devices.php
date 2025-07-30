<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Device;
use App\Models\AssignDeviceLog;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;


class Devices extends Component
{
    use WithPagination;

    public string $search = '';
    

    public $showEditModal = false;
    public $reassignDeviceModal = false;
    public $showAssignModal = false;

    public $user_id;
    public $name;
    public $color;
    public $category;
    public $value;
    public $deviceId;
    public $currentUser;
    public $reason;
    public $comment;

 
    protected $listeners = ['refresh-devices' => '$refresh', 
    'editDevice' => 'loadDevice'];

    public function openAssignModal($deviceId)
{
    // $this->assignDeviceId = $deviceId;
    // $this->reset(['newUser', 'assignReason', 'assignComment']);
    $this->showAssignModal = true;
}


    public function loadDevice($id)
    {
        $device = Device::findOrFail($id);


        $this->deviceId = $device->id;
        $this->currentUser = $device->user_id;
        $this->user_id = $device->user_id;
        $this->name = $device->name;
        $this->color = $device->color;
        $this->category = $device->category;
        $this->value = $device->value;

        $this->showEditModal = true;
    }

    // when unassign button is clicked, this function will be called the modal part
    public function unassignDevice()
    {
        $device = Device::findOrFail($this->deviceId);

        $this->validate([
            'reason' => 'required|string|max:255',
            'comment' => 'required|string|max:500',
        ]);

        $device->update([
            'user_id' => null,
        ]);

        AssignDeviceLog::create([
            'device_id' => $device->id,
            'user_id' => $this->user_id,
            'action_by' => auth()->id(),
            'action_type' => 'unassign',
            'action_date' => now(),
            'reason' => $this->reason,
            'comment' => $this->comment,
        ]);

        $this->dispatch('notify', [
            'type' => 'success',
            'title' => 'Done',
            'message' => 'Device reassigned!'
        ]);

        $this->reassignDeviceModal = false;

        $this->reset(['reason', 'comment', 'deviceId', 'user_id']); // optional cleanup
    }



// when unassign buttton is clicked, this function will be called and modal will be opened
    public function reassignDevice($deviceId)
    {
        $device = Device::findOrFail($deviceId);
        $this->currentUser = $device->user?->name;
        $this->deviceId = $device->id;
        $this->user_id = $device->user_id;
        $this->name = $device->name;
        $this->color = $device->color;
        $this->category = $device->category;
        $this->value = $device->value;
        $this->reassignDeviceModal = true;
    }

    public function update()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'color' => 'required|numeric|min:2',
            'name' => 'required',
            'category' => 'required',
            'value' => 'required|numeric|min:0',
        ]);

        Device::find($this->deviceId)->update([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'color' => $this->color,
            'category' => $this->category,
            'value' => $this->value,
        ]);

        session()->flash('message', 'Device updated successfully.');

        $this->showEditModal = false;
    }

   
   
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Device::findOrFail($id)->delete();
        session()->flash('message', 'Device deleted successfully.');

        $this->dispatch('refresh-Devices');
    }

   

    public function render()
    {
    

        return view('livewire.devices', [
            'devices' => Device::where('name', 'like', '%' . $this->search . '%')
                               ->orWhere('category', 'like', '%' . $this->search . '%')
                               ->paginate(4),
        ]);
    }
}
