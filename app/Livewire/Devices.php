<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Device;
use Livewire\Attributes\Layout;


class Devices extends Component
{
    use WithPagination;

    public string $search = '';

   
   
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

    protected $listeners = ['refresh-devices' => '$refresh'];

    public function render()
    {
    

        return view('livewire.devices', [
            'devices' => Device::where('name', 'like', '%' . $this->search . '%')
                               ->orWhere('category', 'like', '%' . $this->search . '%')
                               ->paginate(4),
        ]);
    }
}
