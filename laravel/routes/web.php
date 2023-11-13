<?php

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

Route::prefix('/')->group(function() {
    Route::get('/', [ArticleController::class , 'index'] )->name("article.index");
    Route::get('article/{item}', [ArticleController::class, 'article'])->name('article.article');
});
Route::prefix('contact')->group(function() {
    Route::get('/', [ContactController::class , 'index'] )->name("contact.index");
    Route::post('confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
    Route::post('thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
});