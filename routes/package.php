<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Livewire\PackageListingTable;



//Route::get('/packages', [PackageController::class,'index'])
//->middleware(['auth'])->middleware('verified')->name('all.packages');

Route::get('/packages', App\Http\Livewire\PackageListingTable::class)->name('packages');

Route::get('/packages/domestic/', [App\Http\Livewire\PackageListingTable::class,'domestic'])
->middleware(['auth'])->middleware('verified')->name('domestic');

Route::get('/packages/international/', [PackageController::class,'international'])
->middleware(['auth'])->middleware('verified')->name('international');