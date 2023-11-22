<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryDController;
use App\Http\Controllers\DestinationController;
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
    return view('landingpage.home');
});



Route::get('/editaja', [PostController::class, 'edit']);

Route::get('/dashboard', function () {
    return view('includes.master');
});

Route::get('/blog/show', function () {
    return view('posts.blog.show');
});

Route::get('/dashboard/post/autoSlug', [PostController::class, 'autoSlug']);

Route::get('/dashboard/post/autoSlugEdit/{slug}', [PostController::class, 'autoSlugEdit']);


Route::resource('/dashboard/post',PostController::class);

Route::resource('/dashboard/destination',DestinationController::class);

Route::resource('/dashboard/destcategory',CategoryDController::class);

Route::resource('/dashboard/postcategory',CategoryController::class);


Route::get('/home', function () {
    return view('landingpage.home');
});

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/destination', function () {
    return view('destination.index');
});


Route::get('/contact', function () {
    return view('landingpage.contact');
});

Route::get('/blog', [BlogController::class, 'index' ]);
Route::get('/blog/{post:slug}', [BlogController::class, 'show' ]);
