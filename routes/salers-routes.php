<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:salers'])->group(function () {
    // Route::get('/saler/dashboard', [SalerController::class, 'dashboard'])->name('saler.dashboard');
});
