<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Attributes\Layout;

class ManageUser extends Component
{

    public $name;
    public $email;
    public $dep_id;
    public $division_id;
    public $designation_id;
    public $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'dep_id' => 'required|exists:departments,id',
        'division_id' => 'required|exists:divisions,id',
        'designation_id' => 'required|exists:designations,id',
        'password' => 'required|min:6',
    ];

    public function addUser()
    {
        $this->validate();

        // Create the user
       $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'dep_id' => $this->dep_id,
            'division_id' => $this->division_id,
            'designation_id' => $this->designation_id,
            'password' => Hash::make($this->password),
        ]);

        // Reset the form
        $this->reset();

        // Close the modal
        $this->dispatch('close-modal', 'add-user-modal');
    }

    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.manage-user');
    }
}
