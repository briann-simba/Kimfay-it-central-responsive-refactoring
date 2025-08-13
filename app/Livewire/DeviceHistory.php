<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\AssignDeviceLog;
use Livewire\WithPagination;


class DeviceHistory extends Component
{

     use WithPagination;

    public string $search = '';

    #[layout('layouts.main')]
    public function render()
    {
        $logs = AssignDeviceLog::with(['device', 'user', 'actionByUser'])
            ->when($this->search, function ($query) {
                $query->whereHas('device', fn ($q) => $q->where('name', 'like', "%{$this->search}%"))
                      ->orWhereHas('user', fn ($q) => $q->where('name', 'like', "%{$this->search}%"))
                      ->orWhereHas('actionByUser', fn ($q) => $q->where('name', 'like', "%{$this->search}%"))
                      ->orWhere('action_type', 'like', "%{$this->search}%")
                      ->orWhere('reason', 'like', "%{$this->search}%")
                      ->orWhere('comment', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.device-history', ['logs' => $logs]);
    }

    public function export()
    {
        // Hardcoded placeholder: you may use Laravel Excel or a CSV writer here
        session()->flash('message', 'Export triggered. Logic not implemented yet.');
    }
    

}
