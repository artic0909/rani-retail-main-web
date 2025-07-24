<?php

use App\Http\Controllers\stocker\ManagerController;
use Illuminate\Support\Facades\Route;

Route::get('/stock-manager-login', [ManagerController::class, 'loginView'])->name('stock-manager-login');
Route::get('/stock-manager-register', [ManagerController::class, 'registerView'])->name('stock-manager-register');
Route::get('/waiting-page', [ManagerController::class, 'waitingPageView'])->name('waiting-page');


Route::post('/stock-manager-register', [ManagerController::class, 'stockManagerRegister'])->name('store.stock-manager-register');

Route::post('stock-manager-login', [ManagerController::class, 'stockManagerLogin'])->name('verify.stock-manager-login');

Route::middleware('auth:managers')->group(function () {
    Route::get('/stock/stock-dashboard', [ManagerController::class, 'stockDashboardView'])->name('stock-dashboard');
    Route::post('/stock-manager-logout', [ManagerController::class, 'stockManagerLogout'])->name('stock-manager.logout');

    // Main Category
    Route::get('/stock/stock-add-main-category', [ManagerController::class, 'addMainCategoryView'])->name('stock-add-main-category');
    Route::post('/stock/stock-add-main-category', [ManagerController::class, 'storeMainCategory'])->name('store.main-category');
    Route::post('/stock/stock-add-sub-category', [ManagerController::class, 'storeSubCategory'])->name('store.sub-category');
    Route::get('/stock/stock-show-sub-category/{slug}', [ManagerController::class, 'subCategoryView'])->name('show.subcategory');
    Route::get('/stock/subcategory-fields/{slug}', [ManagerController::class, 'addSubCategoryFieldsView'])->name('show.subcategory-fields');
    Route::post('/stock/save-subcategory-fields/{subcategory_id}', [ManagerController::class, 'storeDescriptiveFields'])->name('subcategory.fields.save');
    Route::put('/stock/subcategory-fields/edit/{id}', [ManagerController::class, 'editDescriptiveFields'])->name('subcategory.fields.edit');
    Route::delete('/stock/subcategory-fields/delete/{id}', [ManagerController::class, 'deleteDescriptiveFields'])->name('subcategory.fields.delete');

    // Products
    Route::get('/stock/products-create/{subcategorySlug}', [ManagerController::class, 'addProductsView'])->name('stock.products-add.view');
    Route::post('/stock/add-products/{subcategorySlug}', [ManagerController::class, 'storeProduct'])->name('stock.products-store');




});
