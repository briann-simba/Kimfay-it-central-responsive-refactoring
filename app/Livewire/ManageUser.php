<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use App\Models\Department;
use App\Models\Designation;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ManageUser extends Component
{
    use WithPagination;
    
    public $name;
    public $email;
    public $department_id;
    public $division_id;
    public $designation_id;
    public $password;
    public $editingUserId;
    public $role;
    public $editRole;
    public $selectedRoles = [];
    public $editSelectedRoles = [];
    
    public $departments = [];
    public $divisions = [];
    public $designations = [];
    public $selectedUserId;
    public $selectedRole;
    public $users = [];
    public $roles = [];
    public $currentUserRole = '';

    protected $listeners = [
        'userUpdatedOrAdded' => '$refresh',
        'open-add-user-modal' => 'prepareAddUser',
    ];

    public function mount()
    {
        $this->loadDropDownData();
    }

    protected function loadDropDownData()
    {
        $this->departments = Department::where('status', 'active')->orderBy('name')->get();
        $this->divisions = Division::orderBy('name')->get();
        $this->designations = Designation::orderBy('name')->get();
        $this->users = User::orderBy('name')->get();
        $this->roles = Role::orderBy('name')->get()->pluck('name')->toArray();
    }

    public function prepareAddUser()
    {
        $this->reset(['name', 'email', 'department_id', 'division_id', 'designation_id', 'selectedRoles']);
    }

    public function addUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'department_id' => 'required|exists:departments,id',
            'division_id' => 'required|exists:divisions,id',
            'designation_id' => 'required|exists:designations,id',
            'selectedRoles' => 'required|array',
            'selectedRoles.*' => 'exists:roles,name',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'dep_id' => $this->department_id,
            'division_id' => $this->division_id,
            'designation_id' => $this->designation_id,
            'password' => Hash::make('123456'),
        ]);
        
        $user->syncRoles($this->selectedRoles);
        
        $this->reset(['name', 'email', 'department_id', 'division_id', 'designation_id', 'selectedRoles']);
        $this->dispatch('close-add-user-modal');
        $this->dispatch('userUpdatedOrAdded');

        $this->dispatch('notify', 
            type: 'success',
            title: 'User Added',
            message: "User created successfully"
        );
    }

    public function assignRole()
    {
        $this->validate([
            'selectedUserId' => 'required|exists:users,id',
            'selectedRole' => 'required|string|in:'.implode(',', $this->roles),
        ]);

        $user = User::find($this->selectedUserId);
        $user->syncRoles([$this->selectedRole]);

        $this->reset(['selectedUserId', 'selectedRole']);
        $this->dispatch('userUpdatedOrAdded');
        
        $this->dispatch('notify', 
            type: 'success',
            title: 'Role Updated',
            message: "{$user->name}'s role has been updated successfully!"
        );
    }

    public function editUser($userId)
    {
        $user = User::with(['roles','department', 'division', 'designation'])->find($userId);
        
        $this->editingUserId = $userId;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->department_id = $user->dep_id;
        $this->division_id = $user->division_id;
        $this->designation_id = $user->designation_id;
        $this->editSelectedRoles = $user->roles->pluck('name')->toArray();
        
        $this->dispatch('open-edit-user-modal');
    }

    public function updateUser()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$this->editingUserId,
            'department_id' => 'required|exists:departments,id',
            'division_id' => 'required|exists:divisions,id',
            'designation_id' => 'required|exists:designations,id',
            'editSelectedRoles' => 'required|array',
            'editSelectedRoles.*' => 'exists:roles,name',
        ]);

        $user = User::find($this->editingUserId);

        if (!$user) {
            $this->dispatch('notify', type: 'error', title: 'Error', message: "User not found.");
            return;
        }
    
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'department_id' => $this->department_id,
            'division_id' => $this->division_id,
            'designation_id' => $this->designation_id,
        ]);
    
        $user->syncRoles($this->editSelectedRoles);
        $this->reset(['editingUserId', 'name', 'email', 'department_id', 'division_id', 'designation_id', 'editSelectedRoles']);

        $this->dispatch('close-edit-user-modal');
        $this->dispatch('userUpdatedOrAdded');
        $this->dispatch('notify', 
            type: 'success',
            title: 'Update User',
            message: "User has been updated successfully!"
        );
    }

    public function deleteUser($userId)
    {
        User::find($userId)->delete();
        $this->dispatch('userUpdatedOrAdded');
        $this->dispatch('notify', 
            type: 'success',
            title: 'Update User',
            message: "User has been deactivated!"
        );
    }

    #[Layout('layouts.main')]
    public function render()
    {
        return view('livewire.manage-user');
    }
}