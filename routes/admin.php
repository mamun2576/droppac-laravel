<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TopupController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HandlingController;




Route::get('/admin/package/create', [PackageController::class,'create'])
->middleware(['auth'])->middleware('verified')->name('create.package');

Route::get('/admin/packages', [PackageController::class,'index'])
->middleware(['auth'])->middleware('verified')->name('list.packages');	

Route::get('/admin/package/{package}', [PackageController::class,'show'])
->middleware(['auth'])->middleware('verified')->name('show.package');	
	


Route::post('/admin/package/store', [PackageController::class,'store'])
->middleware(['auth'])->middleware('verified')->name('store.package');


Route::patch('/admin/package/update', [PackageController::class,'update'])
->middleware(['auth'])->middleware('verified')->name('update.package');

Route::get('/admin/package/{package}/edit',[PackageController::class,'edit'])
->middleware(['auth'])->middleware('verified')->name('edit.package');

Route::get('/admin/topups',[TopupController::class,'index'])
->middleware(['auth'])->middleware('verified')->name('topups');

Route::get('/admin/topup/{topup}/edit',[TopupController::class,'edit'])
->middleware(['auth'])->middleware('verified')->name('edit.topup');

Route::patch('/admin/topup/update',[TopupController::class,'update'])
->middleware(['auth'])->middleware('verified')->name('update.topup');

Route::get('admin/services/delivery', [ServiceController::class,'index'])
->middleware(['auth'])->middleware('verified')->name('services.delivery');

Route::get('admin/services/handling', [HandlingController::class,'index'])
->middleware(['auth'])->middleware('verified')->name('services.handling');







