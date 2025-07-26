<?php

use App\Http\Controllers\Saler\SalerController;
use Illuminate\Support\Facades\Route;

Route::get('/saler-login', [SalerController::class, 'loginView'])->name('saler-login');
Route::get('/saler-register', [SalerController::class, 'registerView'])->name('saler-register');
Route::get('/waiting-page', [SalerController::class, 'waitingPageView'])->name('waiting-page');


Route::post('/saler-register', [SalerController::class, 'salerRegister'])->name('store.saler-register');

Route::post('/saler-login', [SalerController::class, 'salerLogin'])->name('verify.saler-login');


Route::middleware('auth:salers')->group(function () {

});
