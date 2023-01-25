<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [SearchController::class, 'index'])->name('get.search.index');
Route::get('/search', [SearchController::class, 'index'])->name('get.search.index');
Route::get('/list', [SearchController::class, 'list'])->name('get.search.list');
Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('get.product.detail');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('get.product.show');
