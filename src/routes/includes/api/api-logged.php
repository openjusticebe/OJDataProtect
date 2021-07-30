<?php

use App\Http\Controllers\Api\ApiHomeController;
use App\Http\Controllers\Api\ApiOrganisationController;

Route::prefix('v1')->name('api.')->group(function () {
    Route::get('dashboard', [ApiHomeController::class, 'dashboard'])->name('dashboard');
    Route::post('organisation', [ApiOrganisationController::class, 'store'])->name('organisation.store');
});
