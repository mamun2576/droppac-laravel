<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserSettings;



//Route::get('/settings', App\Http\Livewire\UserSettings::class);

Route::get('/settings/payment/', [PackageController::class,'profile'])
->middleware(['auth'])->middleware('verified')->name('profile');
