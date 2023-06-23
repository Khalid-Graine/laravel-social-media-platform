<?php

use App\Http\Controllers\CommentaireController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\LovesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SavedPostController;
use App\Http\Controllers\SearchController;

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

Route::get('/login', [LoginController::class, 'show'])->name('loginShow');
Route::post('/login', [LoginController::class, 'login'])->name('loginlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [homeController::class, 'index'])->name('home');


Route::resources([
    'profiles' => profileController::class,
    'posts' => PostsController::class,
    'loves' => LovesController::class,
    'commentaires' => CommentaireController::class,
    'saved_posts' => SavedPostController::class,

]);

Route::get('verify_email/{hash}', [profileController::class, 'verifyemail']);
