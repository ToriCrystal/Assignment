<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Middleware\Admin;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ProductController::class, 'index']);
Route::get('/category/{idBrain}', [ProductController::class, 'category']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/detail/{id}/{idloai}', [ProductController::class, 'detail']);
Route::get('/contact', [ProductController::class, 'contact']);
Route::get('/search', [ProductController::class, 'search']);
Route::get('/about', [CartController::class, 'about']);
Route::get('/add-to-cart/{id}', [CartController::class, 'addtocart']);
Route::get('/cart', [CartController::class, 'cart']);
Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/admin/danhmuc', [AdminController::class, 'danhmuc'])->middleware('auth');
Route::get('/admin/sanpham', [AdminController::class, 'product'])->middleware('auth');
Route::get('/admin/taikhoan', [AdminController::class, 'taikhoan'])->middleware('auth');
Route::get('/admin/donhang', [AdminController::class, 'donhang'])->middleware('auth');
Route::get('/admin/xoa/{id}',[AdminController::class,'xoaproduct']);
Route::get('/admin/orderItem/{id_dh}', [AdminController::class, 'orderItem'])->name('admin.orderItem');
Route::get('/editss/{id_sp}', [AdminController::class, 'editss']);
Route::post('/editss/{id_sp}', [AdminController::class, 'updateSanPham']);
Route::post('/thaydoitrangthai', [AdminController::class, 'thayDoiTrangThai'])->middleware('auth');
Route::get('/session', [StripeController::class, 'session']);
Route::post('/session', [StripeController::class, 'session']);


require __DIR__.'/auth.php';
