<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Services\HotelController;
use App\Http\Controllers\Admin\Services\TourContoller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::prefix('admin')->group(function () {
    // Route::get('{seg}', function () {
    //     return view('admin_dashboard');
    // })->where('seg', '|dashboard|test');
    
    // Route::get('dashboard', function () {
    //     return view('admin_dashboard');
    // })->name('admin.dashboard');

    // Auth
    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('admin.login');
    Route::get('/register', function () {
        return view('admin.auth.register');
    })->name('admin.register');

    // Dashboard
    Route::get('dashboard', function () {
        return view('admin.dashboard')->with('title','Admin Dashboard');
    })->name('admin.dashboard');

    // Hotels
    Route::get('hotels',[HotelController::class, 'index'])->name('admin.hotels');
    
    Route::post('hotel/store', [HotelController::class, 'store'])->name('save.hotel');
    Route::post('hotel/edit', [HotelController::class, 'edit'])->name('edit.hotel');
    Route::post('hotel/delete', [HotelController::class, 'delete'])->name('delete.hotel');
    
    // Tours
    Route::get('tours',[TourContoller::class, 'index'])->name('admin.tours');
    
    Route::post('tour/store', [TourContoller::class, 'store'])->name('save.tour');
    Route::post('tour/edit', [TourContoller::class, 'edit'])->name('edit.tour');
    Route::post('tour/delete', [TourContoller::class, 'delete'])->name('delete.tour');
    
});
