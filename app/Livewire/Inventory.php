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
        'user_id' => 'required|exists:users,id',
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:50',
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

        session()->flash('message', 'Device created successfully.');

        // Reset the form fields
        $this->reset(['user_id', 'name', 'color', 'category', 'value']);

             // Send browser event
      $this->dispatch('close-crud-modal'); // ✅ important name match

$this->dispatch('refresh-Devices'); // Notify the parent component to refresh the inventory list

    // Flash message for Livewire UI
    session()->flash('message', 'Device created successfully.');

        
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
