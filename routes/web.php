<?php

use App\Http\Controllers\aboutuscontroller;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\aboutus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Mail;

// Test route

require __DIR__.'/auth.php';

Route::get('/', action: [HomeController::class, 'user_indx'])->name('user.dashboard');
Route::get('/aboutus', [aboutuscontroller::class, 'aboutus'])->name('user.aboutus');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'admin_indx'])->name('dashboard');

    // Product management
    Route::get('admin/products', [ProductController::class, 'index'])->name('product.index');
    Route::post('admin/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('admin/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('admin/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts');
    Route::get('/admin/services', [AdminController::class, 'index'])->name('admin.services.index');
    Route::post('/admin/services/{id}', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::delete('/admin/services/{id}', [ServiceController::class, 'destroy']);
    Route::put('/admin/services/{id}', [ServiceController::class, 'update']);
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
    route::post('/order-confirmation/{id}', [OrderController::class, 'confirmOrder'])->name('order.confirmation');

});
route::get('/test-email', function (){
    Mail::raw('This is a test email', function ($message) {
     $message->to('hhh528288@gmail.com')
     ->subject('Test Email');});
     return 'Test email sent.';});

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');



Route::middleware(['auth', 'user'])->group(function () {
    Route::get('user/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/shop/select/{id}', [ShopController::class, 'select'])->name('shop.select');
    Route::get('user/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contacts', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/shop/store', [ShopController::class, 'store'])->name('shop.store');
    Route::get('user/services', [UserController::class, 'serviceClient'])->name('user.services');


});
