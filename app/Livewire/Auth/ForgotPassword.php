<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;


class ForgotPassword extends Component
{
    public $email;
    public $emailSent = false;
    public $error = null;


     #[layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            $this->emailSent = true;
            $this->error = null;
        } else {
            $this->error = __($status);
        }
    }
}