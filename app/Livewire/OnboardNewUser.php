<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class OnboardNewUser extends Component
{

     public $current = 1;

    public $steps = [
        ['id' => 1, 'title' => 'Personal Info', 'description' => 'Enter employee details'],
        ['id' => 2, 'title' => 'Documentation', 'description' => 'Upload required documents'],
        ['id' => 3, 'title' => 'Confirmation', 'description' => 'Review and submit'],
    ];

    public $formData = [
        'personal' => [
            'firstName' => '',
            'lastName' => '',
            'email' => '',
            'phone' => '',
            'position' => '',
            'department' => '',
            'startDate' => '',
            'manager' => '',
            'salary' => '',
        ],
        'documents' => [
            'contract' => false,
            'idCopy'   => false,
            'taxForm'  => false,
            'nda'      => false,
        ]
    ];

    public function messages()
    {
        return [
            'formData.personal.firstName.required' => 'First Name is required.',
            'formData.personal.lastName.required'  => 'Last Name is required.',
            'formData.personal.email.required'     => 'We need an email to proceed.',
            'formData.personal.email.email'        => 'Please enter a valid email address.',
            'formData.personal.position.required'  => 'Please specify the employee position.',
            'formData.personal.department.required'=> 'You must select a department.',
            'formData.personal.startDate.required' => 'Start Date cannot be empty.',
            'formData.personal.phone.required'   => 'Please provide a valid phone number for the employee.',
            'formData.personal.manager.required'   => 'Assigning a manager is required.',
        ];
    }


        public function rules()
        {
            if ($this->current === 1) {
                return [
                    'formData.personal.firstName' => 'required|string|max:255',
                    'formData.personal.lastName'  => 'required|string|max:255',
                    'formData.personal.email'     => 'required|email|unique:users,email',
                    'formData.personal.phone'     => 'required|string|max:20',
                    'formData.personal.position'  => 'required|string|max:255',
                    'formData.personal.department'=> 'required|string|max:255',
                    'formData.personal.startDate' => 'required|date',
                    'formData.personal.manager'   => 'required|string|max:255',
                    'formData.personal.salary'    => 'required|numeric|min:0',
                ];
            }

            if ($this->current === 2) {
                return [
                    'formData.documents.contract' => 'accepted',
                    'formData.documents.idCopy'   => 'accepted',
                    'formData.documents.taxForm'  => 'accepted',
                    'formData.documents.nda'      => 'accepted',
                ];
            }

            return [];
        }

    public function next()
    {

        $this->validate();
        if ($this->current < count($this->steps)) {
            $this->current++;
            $this->persistStep();
        }
    }

    public function prev()
    {
        if ($this->current > 1) {
            $this->current--;
        }
    }

    public function persistStep()
    {
        if ($this->current === 1) {
            // Save personal info into users table
            $user = User::create([
                'name'       => $this->formData['personal']['firstName'].' '.$this->formData['personal']['lastName'],
                'email'      => $this->formData['personal']['email'],
                'dep_id'     => $this->formData['personal']['department'],
                'password'   => bcrypt('TempPassword123'), // temporary, HR resets later
            ]);
            session(['onboarding_user_id' => $user->id]);
        }

        if ($this->current === 2) {
            // Save documents into onboarding_documents table
            $userId = session('onboarding_user_id');
            foreach ($this->formData['documents'] as $docType => $submitted) {
                OnboardingDocument::updateOrCreate(
                    ['user_id' => $userId, 'document_type' => $docType],
                    ['submitted' => $submitted]
                );
            }
        }
    }

    public function submit()
    {
        $this->persistStep();
        session()->flash('success', 'Onboarding completed successfully!');
        return redirect()->route('dashboard');
    }


    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.onboard-new-user');
    }
}
