<?php

use Illuminate\Support\Facades\Route;
use App\livewire\Home;
use App\livewire\Login;

// Route::get('/', Welcome::class)->name('welcome');
Route::get('/', Login::class)->name('login');

//routes for the authenticated users
Route::middleware(['auth'])->group(function(){
    Route::get('/home', Home::class)->name('home');

    //it routes
    Route::middleware('role:It')->group(function(){
        
    });

    Route::middleware('role:Hr')->group(function(){
        // Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });


});


