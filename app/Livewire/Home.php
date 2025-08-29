<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Mail;
use App\Mail\DiscrepancyReport;
use App\Models\Device;


class Home extends Component
{


public $deviceId;

public function acceptDevice($deviceId)
{
    $this->deviceId = $deviceId;
    Device::where('id', $this->deviceId)->update(['User_Accepted' => 1]);


      session()->flash('notify', [
        'type' => 'success',
        'title' => 'Device Accepted',
        'message' => 'Device accepted successfully.'
    ]);


    return redirect()->route('home');
}


    
    public $discrepancyCategories = [
        'duplicate_tag_number' => 'Duplicate Tag Number',
        'faulty_mouse' => 'Faulty Mouse',
        'broken_screen' => 'Broken Screen',
        'keyboard_issues' => 'Keyboard Issues',
        'battery_problems' => 'Battery Problems',
        'slow_performance' => 'Slow Performance',
        'missing_device' => 'Missing Device',
        'wrong_specifications' => 'Wrong Specifications',
        'other' => 'Other (Please specify in comments)'
    ];

    public function sendReport($deviceId, $categoryKey, $comments)
    {
        $this->validateRequest($deviceId, $categoryKey, $comments);

        try {
            $user = auth()->user() ?? (object)[
                'name' => 'Brian',
                'email' => 'brian@example.com'
            ];

            $device = Device::find($deviceId);
            $category = $this->discrepancyCategories[$categoryKey] ?? $categoryKey;
            
            Mail::to('helpdesk@kimdd.com')->queue(
                new DiscrepancyReport(
                    $user,
                    $comments,
                    $device,
                    $category
                )
            );
            
            $this->dispatch('notify', 
                type: 'success',
                title: 'Mail sent',
                message: "Mail sent successfully"
            );
          
        } catch (\Exception $e) {
            logger()->error('Email failed: '.$e->getMessage());
            
            $this->dispatch('notify', 
                type: 'error',
                title: 'Mail not sent',
                message: "Mail couldn't be sent: ".$e->getMessage()
            );
            
            throw $e; // Re-throw for Alpine.js to catch
        }
    }

    protected function validateRequest($deviceId, $categoryKey, $comments)
    {
        if (empty($deviceId)) {
            throw new \Exception('Please select a device');
        }

        if (empty($categoryKey)) {
            throw new \Exception('Please select a category');
        }

        if (strlen($comments) < 10) {
            throw new \Exception('Comments must be at least 10 characters');
        }
    }

    #[layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.home', [
            'userDevices' => auth()->user()->devices ?? [],
            'discrepancyCategories' => $this->discrepancyCategories
        ]);
    }
}