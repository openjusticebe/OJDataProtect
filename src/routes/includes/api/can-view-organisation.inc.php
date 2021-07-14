<?php

use App\Http\Controllers\Api\ApiProcessController;
use App\Http\Controllers\Api\ApiOrganisationController;

Route::prefix('v1')->name('api.')->group(function () {
    Route::get('process.index', [ApiProcessController::class, 'index'])->name('process.index');
    Route::get('org-{org_slug}', [ApiOrganisationController::class, 'show'])
    ->name('organisation.show');
});
