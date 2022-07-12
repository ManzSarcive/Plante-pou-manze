<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PaniersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ReservationController;

use App\Models\Product;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\Admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/paniers', PaniersController::class);
    Route::resource('/products', ProductsController::class);
    Route::resource('/reservations', ReservationController::class);

});

require __DIR__.'/auth.php';


