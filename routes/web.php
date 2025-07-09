<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Projects\Show;
use App\Livewire\Projects\Create;
use App\Livewire\Projects\Edit;
use App\Livewire\Employees\Index;
use App\Livewire\Employees\Create as CreateEmployee;
use App\Livewire\Employees\Show as ShowEmployee;
use App\Livewire\Employees\Edit as EditEmployee;

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
    Route::get('/employee/{id}', ShowEmployee::class)->name('employees.show');
    Route::get('/edit-employee/{id}', EditEmployee::class)->name('employees.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
