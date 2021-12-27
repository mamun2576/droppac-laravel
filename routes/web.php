<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\PickupController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/courier-request', App\Http\Livewire\DomesticService\CourierRequest::class)->name('courier-request');

Route::get('/pickup/scheduling/', [PickupController::class,'create'])
->middleware(['auth'])->middleware('verified')->name('scedule.pickup');

require __DIR__.'/topup.php';
require __DIR__.'/settings.php';
require __DIR__.'/package.php';
require __DIR__.'/admin.php';
