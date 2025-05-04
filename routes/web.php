<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\ZipController;
use Filament\Infolists\Infolist;
use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('Home');
})->name('home');
Route::get('/info', [InfoController::class,  'index'])->name('info');
Route::get('/zip', function () {
    return view('zip');
})->name('zip');
Route::get('/info', [InfoController::class,  'index'])->name('info');


Route::view('filament.dashboard.pages.dashboard', 'dashboard')
->middleware(['auth', 'verified'])
->name('dashboard'); 

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


require __DIR__ . '/auth.php';
