<?php

use App\Http\Controllers\BukuController;
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

// Route::get('/', function () {
//     return view('buku.index');
// });

Route::get('/', [BukuController::class, 'index'])->name('buku.index');
Route::get('add', [BukuController::class, 'create'])->name('buku.create');
Route::post('store', [BukuController::class, 'store'])->name('buku.store');
Route::get('edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::post('delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');
