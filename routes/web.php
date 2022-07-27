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

Route::get('/paniers', ['App\Http\Controllers\Frontend\PanierController', 'index'])->name('paniers.index');
Route::get('/paniers/{panier}', ['App\Http\Controllers\Frontend\PanierController', 'show'])->name('paniers.show');
Route::get('/reservation/step-one', ['App\Http\Controllers\Frontend\ReservationController', 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', ['App\Http\Controllers\Frontend\ReservationController', 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', ['App\Http\Controllers\Frontend\ReservationController', 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', ['App\Http\Controllers\Frontend\ReservationController', 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', ['App\Http\Controllers\WelcomeController', 'thankyou'])->name('thankyou');

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


