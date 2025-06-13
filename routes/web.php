<?php

use Illuminate\Support\Facades\Route;
use App\livewire\Welcome;
use App\livewire\Home;
use App\livewire\Dashboard;

Route::get('/', Welcome::class)->name('welcome');
 Route::get('/home', Home::class)->name('home');
//routes for the authenticated users
Route::middleware(['auth'])->group(function(){
    //it routes
    Route::middleware('role:It')->group(function(){
        
    });

    Route::middleware('role:Hr')->group(function(){
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
       
    });


});
