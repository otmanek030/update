
<?php

use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'admin_indx'])->name('dashboard');

    // Product management
    Route::get('admin/products', [ProductController::class, 'index'])->name('product.index');
    Route::post('admin/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('admin/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('admin/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts');
});


Route::middleware(['auth', 'user'])->group(function () {
    Route::get('user/dashboardU', [HomeController::class, 'user_indx'])->name('user.dashboard');
    Route::get('user/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/shop/select/{id}', [ShopController::class, 'select'])->name('shop.select');
    Route::get('user/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contacts', [ContactController::class, 'store'])->name('contact.store');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::post('/shop/order', [ShopController::class, 'store'])->name('shop.store');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
});

