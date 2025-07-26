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

    // Profile
    Route::get('/stock/stock-profile', [ManagerController::class, 'profileView'])->name('stock-manager-profile');
    Route::post('/stock/update-profile', [ManagerController::class, 'updateProfile'])->name('manager.updateProfile');
    Route::post('/stock/update-password', [ManagerController::class, 'updateProfilePassword'])->name('manager.updatePassword');





    // Main Category
    Route::get('/stock/stock-add-main-category', [ManagerController::class, 'addMainCategoryView'])->name('stock-add-main-category');
    Route::post('/stock/stock-add-main-category', [ManagerController::class, 'storeMainCategory'])->name('store.main-category');
    Route::post('/stock/stock-add-sub-category', [ManagerController::class, 'storeSubCategory'])->name('store.sub-category');
    Route::get('/stock/stock-show-sub-category/{slug}', [ManagerController::class, 'subCategoryView'])->name('show.subcategory');
    Route::get('/stock/subcategory-fields/{slug}', [ManagerController::class, 'addSubCategoryFieldsView'])->name('show.subcategory-fields');
    Route::post('/stock/save-subcategory-fields/{subcategory_id}', [ManagerController::class, 'storeDescriptiveFields'])->name('subcategory.fields.save');
    Route::put('/stock/subcategory-fields/edit/{id}', [ManagerController::class, 'editDescriptiveFields'])->name('subcategory.fields.edit');
    Route::delete('/stock/subcategory-fields/delete/{id}', [ManagerController::class, 'deleteDescriptiveFields'])->name('subcategory.fields.delete');

    // Only For Main Category
    Route::get('/stock/stock-all-main-category', [ManagerController::class, 'showAllMainCategory'])->name('show.all-main-category');
    Route::post('/stock/stock-all-main-category', [ManagerController::class, 'editMainCategory'])->name('main-category.update');
    Route::post('/stock/main-category/delete/{id}', [ManagerController::class, 'deleteMainCategory'])->name('main-category.delete');

    // Only For Sub Category
    Route::get('/stock/stock-all-sub-category', [ManagerController::class, 'showAllSubCategory'])->name('show.all-sub-category');
    Route::post('/stock/stock-all-sub-category', [ManagerController::class, 'editSubCategory'])->name('sub-category.update');
    Route::post('/stock/sub-category/delete/{id}', [ManagerController::class, 'deleteSubCategory'])->name('sub-category.delete');



    // Products
    Route::get('/stock/products-create/{subcategorySlug}', [ManagerController::class, 'addProductsView'])->name('stock.products-add.view');
    Route::post('/stock/add-products/{subcategorySlug}', [ManagerController::class, 'storeProduct'])->name('stock.products-store');

    // Products Show
    Route::get('/stock/stock-all-products/', [ManagerController::class, 'showCategoryWiseProducts'])->name('stock.all-products');


    Route::get('/stock/get-subcategories/{mainCategoryId}', [ManagerController::class, 'getSubcategories']);
    Route::post('/stock/get-products', [ManagerController::class, 'getProducts'])->name('get.products');
    Route::delete('/stock/delete-product/{id}', [ManagerController::class, 'deleteProduct'])->name('delete.product');

    Route::get('/stock/products/{id}/edit', [ManagerController::class, 'editProductView'])->name('products.edit.view');
    Route::put('/stock/products/{id}/edit', [ManagerController::class, 'editProduct'])->name('products.edit.update');

    // Product all list show
    Route::get('/stock/stock-list-all-products', [ManagerController::class, 'allProductsList'])->name('stock.list-all-products');

    // Stock Report
    Route::get('/stock/stock-stock-report', [ManagerController::class, 'stockReportView'])->name('stock-report');


    // Sales Report
    Route::get('/stock/stock-sales-report', [ManagerController::class, 'salesReportView'])->name('stock-sales-report');
});
