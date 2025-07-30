<?php

use App\Http\Controllers\Saler\SalerController;
use Illuminate\Support\Facades\Route;

Route::get('/saler-login', [SalerController::class, 'loginView'])->name('saler-login');
Route::get('/saler-register', [SalerController::class, 'registerView'])->name('saler-register');
Route::get('/waiting-page', [SalerController::class, 'waitingPageView'])->name('waiting-page');


Route::post('/saler-register', [SalerController::class, 'salerRegister'])->name('store.saler-register');

Route::post('/saler-login', [SalerController::class, 'salerLogin'])->name('verify.saler-login');


Route::middleware('auth:salers')->group(function () {
    Route::get('/saler/saler-dashboard', [SalerController::class, 'salerDashboardView'])->name('saler-dashboard');
    Route::post('/saler/saler-logout', [SalerController::class, 'salerLogout'])->name('saler.logout');

    // All Products
    Route::get('/saler/saler-all-products', [SalerController::class, 'allProductsView'])->name('saler-all-products');
    Route::post('/saler/add-to-cart', [SalerController::class, 'addToCart'])->name('cart.add');

    // Cart
    Route::get('/saler/saler-cart-items', [SalerController::class, 'cartView'])->name('saler-cart');
    Route::post('/saler/saler-cart-items/checkouts/store', [SalerController::class, 'checkOut'])->name('checkouts.store');
    Route::delete('/saler/saler-cart-items/checkout/delete', [SalerController::class, 'deleteCheckOutData'])->name('checkout.delete');
    Route::delete('/saler/cart/delete-item/{product_id}', [SalerController::class, 'deleteCartItem'])->name('cart.delete.item');




    // Generate Bill
    Route::post('/saler/generate-bill', [SalerController::class, 'generateBill'])->name('generate-bill.store');
});
