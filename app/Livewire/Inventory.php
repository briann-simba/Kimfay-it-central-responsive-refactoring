<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Device;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Device::findOrFail($id)->delete();
        session()->flash('message', 'Device deleted successfully.');
    }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        $devices = Device::query()
            ->when($this->search, function ($query) {
                $query->where(function ($subquery) {
                    $subquery->where('name', 'like', '%' . $this->search . '%')
                             ->orWhere('category', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('name')
            ->paginate(4);

        return view('livewire.inventory', ['devices' => $devices]);
    }
}
