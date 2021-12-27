<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserSettings;

Route::get('/settings/profile/', [PackageController::class,'profile'])
->middleware(['auth'])->middleware('verified')->name('profile');
