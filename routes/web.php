<?php

use App\Livewire\Home;

use App\livewire\Login;
use App\livewire\Inventory;
use App\livewire\ManageUser;
use App\Livewire\ManageRoles;
use App\livewire\OffboardUser;
use App\livewire\DeviceHistory;

use App\livewire\PendingApproval;
use App\Livewire\ManagePermissions;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgotPassword;
use App\livewire\initiateoffboarding;
use Illuminate\Support\Facades\Route;


// Password reset routes
Route::get('/forgot-password', ForgotPassword::class)
    ->middleware('guest')
    ->name('password.request');

Route::get('/reset-password/{token}', ResetPassword::class)
    ->middleware('guest')
    ->name('password.reset');
    
// Route::get('/', Welcome::class)->name('welcome');
Route::get('/', Login::class)->name('login');
//Route::get('/users', App\livewire\Users::class)->name('users');
//routes for the authenticated users
Route::middleware(['auth'])->group(function(){

    // general route for all authenticated users but restricted to what they can view
    Route::get('/home', Home::class)->name('home');

    Route::get('/usermanagement', ManageUser::class)->name('usermanagement');
    Route::get('/rolemanagement', ManageRoles::class)->name('rolemanagement');
    Route::get('/permissionmanagement', ManagePermissions::class)->name('permissionmanagement');

    Route::get('/offboarduser', OffboardUser::class)->name('offboarduser');
    Route::get('/initiateoffboarding', initiateoffboarding::class)->name('initiateoffboarding');
    Route::get('/inventory', Inventory::class)->name('inventory');
    Route::get('/pendingapproval', PendingApproval::class)->name('pendingapproval');
    Route::get('/devicehistory', DeviceHistory::class)->name('devicehistory');

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


