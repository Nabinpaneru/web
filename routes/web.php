<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\MultiController;
use App\Http\Controllers\Home\ProtfolioController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\BlogcategoryController;




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
})->name('frontend.index');

////// Admin Route //////
Route::controller(AdminController::class)->group(function () {
    Route::get('/logout',[AdminController::class,'destroy'])->name('admin.logout');
    Route::get('/admin-profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('/admin-edit',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/admin-update',[AdminController::class,'update'])->name('admin.update');
    Route::get('/admin-password',[AdminController::class,'password'])->name('change.password');
    Route::post('/admin-update-password',[AdminController::class,'update_password'])->name('admin.update_password');
});

////home slider///
Route::controller(HomeSlideController::class)->group(function () {
    Route::get('/homeslide',[HomeSlideController::class,'homeslider'])->name('home.slide');
    Route::post('/homeslide/update',[HomeSlideController::class,'homeslider_update'])->name('home.update');
    
  
});

////About page///
Route::controller(AboutController::class)->group(function () {
    Route::get('/aboutpage',[AboutController::class,'aboutpage'])->name('about.page');
    Route::post('/aboutpage/update',[AboutController::class,'about_update'])->name('about.update');
    Route::get('/about',[AboutController::class,'aboutheader'])->name('home.about');
  });

////Multi image///
Route::controller(MultiController::class)->group(function () {
    Route::get('/multi-image',[MultiController::class,'multi'])->name('multi.image');
    Route::post('/save-image',[MultiController::class,'multi_save'])->name('multi.save');
    Route::get('/all-image',[MultiController::class,'all_image'])->name('All.image');
    Route::get('/edit-image-{id}',[MultiController::class,'multi_edit'])->name('image.edit');
    Route::post('/update-image-{id}',[MultiController::class,'multi_update'])->name('image.update');
    Route::get('/image-delete-{id}',[MultiController::class,'multi_delete'])->name('image.delete');
   
   
  });

 ////Protfolio Setup///
Route::controller(ProtfolioController::class)->group(function () {
    Route::get('/all-protfolio',[ProtfolioController::class,'protfolio_all'])->name('all.protfolio');
    Route::get('/add-protfolio',[ProtfolioController::class,'protfolio_add'])->name('add.protfolio');
    Route::post('/save-protfolio',[ProtfolioController::class,'protfolio_save'])->name('save.protfolio');
    Route::get('/edit-protfolio-{id}',[ProtfolioController::class,'protfolio_edit'])->name('edit.protfolio');
    Route::post('/update-protfolio-{id}',[ProtfolioController::class,'protfolio_update'])->name('update.protfolio');
    Route::get('/delete-protfolio-{id}',[ProtfolioController::class,'protfolio_delete'])->name('delete.protfolio');
    
  
}); 
////Blog///
Route::controller(BlogController::class)->group(function () {
    Route::get('/all-blog',[BlogController::class,'all_blog'])->name('all.blog');
    Route::get('/add-blog',[BlogController::class,'add_blog'])->name('add.blog');
    Route::post('/save-blog',[BlogController::class,'save_blog'])->name('save.blog');
    Route::get('/edit-blog-{id}',[BlogController::class,'edit_blog'])->name('edit.blog');
    Route::get('/delete-blog-{id}',[BlogController::class,'delete_blog'])->name('delete.blog');
    Route::post('/update-blog-{id}',[BlogController::class,'update_blog'])->name('update.blog');
   
  });
  ////Blog Category///
Route::controller(BlogController::class)->group(function () {
    Route::get('/all-blogcategory',[BlogcategoryController::class,'all_blogcategory'])->name('all.blogcategory');
    Route::get('/add-blogcategory',[BlogcategoryController::class,'add_blogcategory'])->name('add.blogcategory');
    Route::post('/save-blogcategory',[BlogcategoryController::class,'save_blogcategory'])->name('save.blogcategory');
    Route::get('/edit-blogcategory-{id}',[BlogcategoryController::class,'edit_blogcategory'])->name('edit.blogcategory');
    Route::get('/delete-blogcategory-{id}',[BlogcategoryController::class,'delete_blogcategory'])->name('delete.blogcategory');
    Route::get('/view-blogcategory-{id}',[BlogcategoryController::class,'view_blogcategory'])->name('view.blogcategory');
    Route::post('/update-blogcategory-{id}',[BlogcategoryController::class,'update_blogcategory'])->name('update.blogcategory');
    
   
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
