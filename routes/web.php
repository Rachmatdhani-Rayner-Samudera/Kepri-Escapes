<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryDController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
use App\Models\CategoryD;
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


Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){



});


Route::get('/dashboard', function () {
    return view('includes.master');
});

// <--------- Auto Slug Route ---------->
Route::get('/dashboard/post/autoSlug', [PostController::class, 'autoSlug']);
Route::get('/dashboard/postcategory/autoSlug', [CategoryController::class, 'autoSlug']);
Route::get('/dashboard/destination/autoSlug', [DestinationController::class, 'autoSlug']);

// <--------- Core Route ---------->
Route::resource('/dashboard/post',PostController::class);

Route::resource('/dashboard/destination',DestinationController::class);

Route::resource('/dashboard/destcategory',CategoryDController::class);

Route::resource('/dashboard/postcategory',CategoryController::class);



// <--------- Landing Page Route ---------->
Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/blog', [BlogController::class, 'index' ]);
Route::get('/destination', [HomeController::class, 'destination']);
Route::get('/contact', [HomeController::class, 'contact']);



// <--------- Single Post Route ---------->
Route::get('/blog/{post:slug}', [BlogController::class, 'show' ]);
Route::get('/postcategories/{category:slug}', function(Category $category, CategoryD $destcategory){
    $destcategory = categoryD::all();
    return view('posts/categoryp/show', [
        'category_name' => $category->category_name,
        'posts' => $category->Post,
        'destcategory'=> $destcategory
    ]);
});


// <--------- Login && Register Route ---------->

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
