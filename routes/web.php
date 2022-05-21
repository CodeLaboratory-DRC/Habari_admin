<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [AuthController::class, 'form_login'])->name('login');

Route::get('/signin', [AuthController::class, 'signin']); //to remove

Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('profil', [AuthController::class, 'profil'])->name('profil');

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('categorie', [CategorieController::class, 'create'])->name('categorie');
    Route::post('categorie', [CategorieController::class, 'store'])->name('categorie.post');


    Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');

    Route::get('categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}', [CategorieController::class, 'update'])->name('categories.update');

    Route::get('categorie/{id}/delete', [CategorieController::class, 'destroy'])->name('categorie.delete');


    Route::get('newses', [NewsController::class, 'index'])->name('newses.index');

    Route::get('newses/{id}/show', [NewsController::class, 'show'])->name('newses.show');

    Route::get('news', [NewsController::class, 'create'])->name('news');
    Route::post('news', [NewsController::class, 'store'])->name('news.post');
});
