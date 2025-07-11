<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Device;

class Users extends Component
{
    public string $search = '';


public function render()
{
    logger('Search term is: ' . $this->search); // logs to Laravel log
    return view('livewire.users', [
        'search' => $this->search,
    ]);
}


}
