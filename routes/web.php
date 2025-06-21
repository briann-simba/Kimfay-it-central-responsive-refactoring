<?php

use Illuminate\Support\Facades\Route;
use App\livewire\Home;
use App\livewire\Login;
use App\livewire\ManageUser;
use App\livewire\OffboardUser;
use App\livewire\initiateoffboarding;
use App\livewire\Inventory;

// Route::get('/', Welcome::class)->name('welcome');
Route::get('/', Login::class)->name('login');

//routes for the authenticated users
Route::middleware(['auth'])->group(function(){

    // general route for all authenticated users but restricted to what they can view
    Route::get('/home', Home::class)->name('home');

    Route::get('/usermanagement', ManageUser::class)->name('usermanagement');
    Route::get('/offboarduser', OffboardUser::class)->name('offboarduser');
    Route::get('/initiateoffboarding', initiateoffboarding::class)->name('initiateoffboarding');
    Route::get('/inventory', Inventory::class)->name('inventory');

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


