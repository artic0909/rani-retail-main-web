<?php

use App\Http\Controllers\Saler\SalerController;
use Illuminate\Support\Facades\Route;

Route::get('/saler-login', [SalerController::class, 'loginView'])->name('saler.saler-login');
Route::get('/saler-register', [SalerController::class, 'registerView'])->name('saler.saler-register');
Route::get('/waiting-page', [SalerController::class, 'waitingPageView'])->name('saler.waiting-page');


Route::post('/saler-register', [SalerController::class, 'salerRegister'])->name('saler.store.saler-register');

Route::post('/saler-login', [SalerController::class, 'salerLogin'])->name('saler.verify.saler-login');


Route::middleware('auth:salers')->group(function () {
    Route::get('/saler/saler-dashboard', [SalerController::class, 'salerDashboardView'])->name('saler.saler-dashboard');
    Route::post('/saler/saler-logout', [SalerController::class, 'salerLogout'])->name('saler.saler.logout');

    // All Products
    Route::get('/saler/saler-all-products', [SalerController::class, 'allProductsView'])->name('saler.saler-all-products');
    Route::post('/saler/add-to-cart', [SalerController::class, 'addToCart'])->name('saler.cart.add');

    // Cart
    Route::get('/saler/saler-cart-items', [SalerController::class, 'cartView'])->name('saler.saler-cart');
    Route::post('/saler/saler-cart-items/checkouts/store', [SalerController::class, 'checkOut'])->name('saler.checkouts.store');
    Route::delete('/saler/saler-cart-items/checkout/delete', [SalerController::class, 'deleteCheckOutData'])->name('saler.checkout.delete');
    Route::delete('/saler/cart/delete-item/{product_id}', [SalerController::class, 'deleteCartItem'])->name('saler.cart.delete.item');

    // Product Filter
    Route::get('/saler/saler-find-products', [SalerController::class, 'productFilterView'])->name('saler.saler-product-filter');
    Route::get('/saler/get-subcategories/{mainCategoryId}', [SalerController::class, 'getSubcategories']);
    Route::post('/saler/get-products', [SalerController::class, 'getProducts']);

    // Sales Report
    Route::get('/saler/saler-sales-report', [SalerController::class, 'salesReport'])->name('saler.sales.report');
    Route::get('/saler/sales-report/export', [SalerController::class, 'exportSalesReport'])->name('saler.sales.report.export');

    // Saler Profile
    Route::get('/saler/saler-profile', [SalerController::class, 'salerProfileView'])->name('saler.saler-profile');
    Route::post('/saler/update-profile', [SalerController::class, 'updateProfile'])->name('saler.updateProfile');
    Route::post('/saler/update-password', [SalerController::class, 'updateProfilePassword'])->name('saler.updatePassword');

    // Stock Refill
    Route::get('/saler/sales-stock-refill', [SalerController::class, 'stockRefillView'])->name('saler.stock-refill');
    Route::get('/saler/export-stock-refill', [SalerController::class, 'exportStockRefill'])->name('saler.export.stock.refill');

    // PDF Download
    Route::get('/saler/pdf-download/{id}', [SalerController::class, 'pdfDownload'])->name('saler.pdf.download');





    // Generate Bill
    Route::post('/saler/generate-bill', [SalerController::class, 'generateBill'])->name('saler.generate-bill.store');
});
