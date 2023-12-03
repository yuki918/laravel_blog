<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->group(function() {
  Route::get('/', [ArticleController::class , 'index'] )->name("article.index");
  Route::get('article/{item}', [ArticleController::class, 'article'])->name('article.article');
  Route::post('article/store', [ArticleController::class, 'store'])->name('article.store');
  Route::post('like', [ArticleController::class, 'like'])->name('article.like');
});
Route::prefix('contact')->group(function() {
  Route::get('/', [ContactController::class , 'index'] )->name("contact.index");
  Route::post('confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
  Route::post('thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['verified'])->name('dashboard');
    Route::get('/comment', [ProfileController::class, 'comment'])->name('comment');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';