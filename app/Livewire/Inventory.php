<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Device;
use Livewire\Attributes\Layout;

class Inventory extends Component
{
   use WithPagination;

   public function resetForm()
{
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset(['user_id', 'name', 'color', 'category', 'value']);
}

    public string $search = '';

    public $user_id;
    public $name;
    public $color;
    public $category;
    public $value;

    protected $rules = [
        'user_id' => 'nullable|exists:users,id',
        'name' => 'required|string|max:255',
        'color' => 'required|numeric|min:2',
        'category' => 'required|string|max:50',
        'value' => 'required|numeric|min:0',
    ];

    public function create()
    {
        $this->validate();

        Device::create([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'color' => $this->color,
            'category' => $this->category,
            'value' => $this->value,
        ]);

       

        // Reset the form fields
    $this->reset(['user_id', 'name', 'color', 'category', 'value']);

    // Flash message for Livewire UI
    $this->dispatch('notify', 
                type: 'success',
                title: 'Device Created',
                message: "Device Created successfully."
    );

    $this->dispatch('refresh-devices');

    $this->dispatch('close-modal');

     
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

 

    #[Layout('layouts.dashboard')]
    public function render()
    {
         return view('livewire.inventory', [
            'devices' => Device::where('name', 'like', '%' . $this->search . '%')
                               ->orWhere('category', 'like', '%' . $this->search . '%')
                               ->paginate(4),
        ]);
    }
}
