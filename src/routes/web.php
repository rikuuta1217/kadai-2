<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/products',[ProductController::class,'content'])->name('products.content'); //商品一覧
Route::get('/products/register',[ProductController::class,'register'])->name('products.register'); //商品登録
// Route::get('/',function () {return view('content_detail'); });

// ↓一旦/aa/仮パスで
Route::get('/products/{productId}',[ProductController::class,'content_detail'])->name('products.content_detail'); //商品変更
Route::put('/products/{productId}/update',[ProductController::class,'update'])->name('product.update'); //商品更新
Route::post('/products/register',[ProductController::class,'store'])->name('products.store'); //商品保存

