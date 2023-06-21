<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSlideController;



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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/frontend-web', function () {
    return view('frontend.index');
});

////// Admin Route //////
Route::controller(AdminController::class)->group(function () {
    Route::get('/logout',[AdminController::class,'destroy'])->name('admin.logout');
    Route::get('/admin-profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('/admin-edit',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/admin-update',[AdminController::class,'update'])->name('admin.update');
    Route::get('/admin-password',[AdminController::class,'password'])->name('change.password');
    Route::post('/admin-update-password',[AdminController::class,'update_password'])->name('admin.update_password');
});

Route::controller(HomeSlideController::class)->group(function () {
    Route::get('/homeslide',[HomeSlideController::class,'homeslider'])->name('home.slide');
  
});


///// end route ///


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
