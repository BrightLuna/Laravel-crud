<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\DoujinController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\ShelfController;
use Illuminate\Support\Facades\Route;

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

//mangacontroller
Route::get('/manga', [MangaController::class, 'index'])->name('manga.index');
Route::get('/manga-add', [MangaController::class, 'create'])->name('manga.create');
Route::post('/manga-store', [MangaController::class, 'store'])->name('manga.store');
Route::get('/manga-edit/{id}', [MangaController::class, 'edit'])->name('manga.edit');
Route::post('/manga-update/{id}', [MangaController::class, 'update'])->name('manga.update');
Route::post('/manga-delete/{id}', [MangaController::class, 'delete'])->name('manga.delete');
Route::get('/manga-search', [MangaController::class, 'search'])->name('manga.search');
Route::post('/manga-recycle/{id}', [MangaController::class, 'recycle'])->name('manga.recycle');
Route::get('/manga-restore/{id}', [MangaController::class, 'restore'])->name('manga.restore');

//doujincontroller
Route::get('/doujin', [DoujinController::class, 'index'])->name('doujin.index');
Route::get('/doujin-add', [DoujinController::class, 'create'])->name('doujin.create');
Route::post('/doujin-store', [DoujinController::class, 'store'])->name('doujin.store');
Route::get('/doujin-edit/{id}', [DoujinController::class, 'edit'])->name('doujin.edit');
Route::post('/doujin-update/{id}', [DoujinController::class, 'update'])->name('doujin.update');
Route::post('/doujin-delete/{id}', [DoujinController::class, 'delete'])->name('doujin.delete');
Route::get('/doujin-search', [DoujinController::class, 'search'])->name('doujin.search');
Route::post('/doujin-recycle/{id}', [DoujinController::class, 'recycle'])->name('doujin.recycle');
Route::get('/doujin-restore/{id}', [DoujinController::class, 'restore'])->name('doujin.restore');

//magazinecontroller
Route::get('/magazine', [MagazineController::class, 'index'])->name('magazine.index');
Route::get('/magazine-add', [MagazineController::class, 'create'])->name('magazine.create');
Route::post('/magazine-store', [MagazineController::class, 'store'])->name('magazine.store');
Route::get('/magazine-edit/{id}', [MagazineController::class, 'edit'])->name('magazine.edit');
Route::post('/magazine-update/{id}', [MagazineController::class, 'update'])->name('magazine.update');
Route::post('/magazine-delete/{id}', [MagazineController::class, 'delete'])->name('magazine.delete');
Route::get('/magazine-search', [MagazineController::class, 'search'])->name('magazine.search');
Route::post('/magazine-recycle/{id}', [MagazineController::class, 'recycle'])->name('magazine.recycle');
Route::get('/magazine-restore/{id}', [MagazineController::class, 'restore'])->name('magazine.restore');

//shelfcontroller
Route::get('/shelf', [ShelfController::class, 'index'])->name('shelf.index');
Route::get('/shelf-search', [ShelfController::class, 'search'])->name('shelf.search');
Route::get('/shelf-store', [ShelfController::class, 'store'])->name('shelf.store');

//homecontroller
Route::get('/', [HomeController::class, 'index'])->name('home');

//usercontroller
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::post('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

//logout
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//auth
Auth::routes();
