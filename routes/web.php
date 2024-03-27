<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/check-mail', [HomeController::class, 'showCheckMailView'])->name('checkMail');
Route::get('home',[HomeController::class,'index']);
Route::get('admin', [AdminController::class, 'index'])->middleware('admin')->name('admin');
Route::get('premium/{post}',[PostController::class,'togglePremium'])->middleware('admin')->name('toggle.premium');
Route::get('published/{post}',[PostController::class,'togglePublished'])->middleware('admin')->name('toggle.published');

Route::get('category/{category}/posts', [HomeController::class, 'postsBycategory'])->name('category.posts');
Route::get('tag/{tag}/posts', [HomeController::class, 'postsByTag'])->name('tag.posts');

Auth::routes();

// Route pour afficher le profil de l'utilisateur
Route::get('/profile', [UserController::class, 'show'])->name('profile.show');

// Route pour afficher le formulaire d'édition du profil de l'utilisateur
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::get('/myposts', [PostController::class, 'myposts'])->name('posts.myposts');


// Route pour mettre à jour le profil de l'utilisateur
Route::put('/profile/update', [UserController::class, 'updateprofile'])->name('profile.update');
Route::get('/user/{id}', [UserController::class, 'showother'])->name('user.showother');
route::resource('posts', PostController::class);
Route::post('like', [PostController::class, 'getlike']);
Route::post('like/{id}', [PostController::class, 'like']);
Route::post('dislike', [PostController::class, 'getDislike']);
Route::post('dislike/{id}', [PostController::class, 'dislike']);
Route::post('removeDislike/{id}', [PostController::class, 'removeDislike']);
Route::get('notifications/{post_id}',[CommentController::class, 'getNotifications']);



