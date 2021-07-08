<?php

use App\Http\Controllers\Api\ApiHomeController;

Route::prefix('v1')->name('api.')->group(function () {
    Route::get('dashboard', [ApiHomeController::class, 'dashboard'])->name('dashboard');
});
