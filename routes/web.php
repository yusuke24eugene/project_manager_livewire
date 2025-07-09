<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Projects\Show;
use App\Livewire\Projects\Create;
use App\Livewire\Projects\Edit;
use App\Livewire\Employees\Index;
use App\Livewire\Employees\Create as CreateEmployee;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Projects route
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/create-project', Create::class)->name('create-project');
    Route::get('/project/{id}', Show::class)->name('projects.show');
    Route::get('/edit-project/{id}', Edit::class)->name('projects.edit');

    // Employees route
    Route::get('/employees', Index::class)->name('employees');
    Route::get('/create-employee', CreateEmployee::class)->name('create-employee');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
