<?php

use Illuminate\Support\Facades\Route;
use App\livewire\Welcome;
use App\livewire\Home;
use App\livewire\Dashboard;


Route::get('/', Welcome::class)->name('welcome');
Route::get('/home', Home::class)->name('home');
Route::get('/dashboard', Dashboard::class)->name('dashboard');

