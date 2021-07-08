<?php

use App\Http\Controllers\Api\ApiProcessController;

Route::prefix('v1')->name('api.')->group(function () {
    Route::get('process.index', [ApiProcessController::class, 'index'])->name('process.index');
});
