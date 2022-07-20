<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\PanierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReservationController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\Admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/paniers', PanierController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/reservations', ReservationController::class);

});

require __DIR__.'/auth.php';


