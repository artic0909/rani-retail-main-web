<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\stocker\ManagerController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('home');
})->name('home');








// ============================================================================================================================================================
// ================Super Admin Routes==========================================================================================================================
// ============================================================================================================================================================
Route::view('dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin-stock-manager', [AdminController::class, 'stockManagerView'])->name('admin.admin-stock-manager');
    Route::get('/admin-stock-manager/{id}', [AdminController::class, 'addToManager'])->name('store.admin-stock-manager');

    Route::get('/remove-stock-manager/{id}', [AdminController::class, 'removeFromManager'])->name('remove.admin-stock-manager');
    Route::get('/delete-user/{id}', [AdminController::class, 'deleteManager'])->name('delete.admin-user');



    Route::get('/admin-saler', [AdminController::class, 'salerView'])->name('admin.admin-saler');
});



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
// ============================================================================================================================================================
// ================Super Admin Routes==========================================================================================================================
// ============================================================================================================================================================

require __DIR__.'/auth.php';
require __DIR__.'/manager-routes.php';
require __DIR__.'/saler-routes.php';
