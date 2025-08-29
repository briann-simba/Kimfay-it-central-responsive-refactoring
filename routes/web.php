<?php

use App\livewire\Home;
use App\livewire\Login;
use App\livewire\Inventory;
use App\livewire\ManageUser;
use App\livewire\Onboarding;
use App\Livewire\ManageRoles;
use App\livewire\OffboardUser;
use App\livewire\DeviceHistory;
use App\livewire\GettingStarted;
use App\livewire\OnboardNewUser;
use App\livewire\PendingApproval;
use App\livewire\ContinueOnboarding;
use App\livewire\InventoryAnalytics;
use App\livewire\initiateoffboarding;
use Illuminate\Support\Facades\Route;


// Route::get('/', Welcome::class)->name('welcome');
Route::get('/', Login::class)->name('login');
Route::get('/users', App\livewire\Users::class)->name('users');

//routes for the authenticated users
Route::middleware(['auth'])->group(function(){

    // general route for all authenticated users but restricted to what they can view
    Route::get('/home', Home::class)->name('home');

    Route::get('/usermanagement', ManageUser::class)->name('usermanagement');
    Route::get('/rolemanagement', ManageRoles::class)->name('rolemanagement');
    Route::get('/offboarduser', OffboardUser::class)->name('offboarduser');
    Route::get('/initiateoffboarding', initiateoffboarding::class)->name('initiateoffboarding');
    Route::get('/inventory', Inventory::class)->name('inventory');
    Route::get('/pendingapproval', PendingApproval::class)->name('pendingapproval');
    Route::get('/devicehistory', DeviceHistory::class)->name('devicehistory');
    Route::get('/onboarding', Onboarding::class)->name('onboarding');
    Route::get('/onboard-new-user',OnboardNewUser::class)->name('onboard-new-user');
    Route::get('/continue-onboarding', ContinueOnboarding::class)->name('continue-onboarding');
    Route::get('/getting-started', GettingStarted::class)->name('getting-started');
    Route::get('/inventory-analytics', InventoryAnalytics::class)->name('inventory-analytics');

    //it routes
    Route::middleware('role:It')->group(function(){
        
    });

    Route::middleware('role:Hr')->group(function(){
        // Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });

    Route::middleware('role:SuperAdmin')->group(function(){
        // Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });

    Route::middleware('role:LineManager')->group(function(){
        // Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });

    Route::middleware('role:AdminOfficer')->group(function(){
        // Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });

    Route::middleware('role:Finance')->group(function(){
        // Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });

    Route::middleware('role:User')->group(function(){
        // Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });


});


