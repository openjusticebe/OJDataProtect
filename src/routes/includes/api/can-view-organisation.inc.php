<?php

use App\Http\Controllers\Api\ApiProcessController;
use App\Http\Controllers\Api\ApiOrganisationController;
use App\Http\Controllers\Api\ApiOrganisationUserController;
use App\Http\Controllers\Api\ApiOrganisationProcessController;

Route::prefix('v1')->name('api.')->group(function () {
    Route::get('process.index', [ApiProcessController::class, 'index'])->name('process.index');
    Route::get('org-{org_slug}', [ApiOrganisationController::class, 'show'])
    ->name('organisation.show');
    // Route::post('org-{org_slug}/update', [ApiOrganisationController::class, 'update'])
    // ->name('organisation.update');


    # Organisation
    Route::apiResource('organisation', ApiOrganisationController::class)->only(['show','update', 'index', 'destroy'])->parameters([
            'organisation' => 'organisation:slug',
          ]);
        

    # process
    Route::apiResource('organisation.process', ApiOrganisationProcessController::class)->parameters([
    'organisation' => 'organisation:slug',
    'process' => 'process:slug',
  ]);

    Route::apiResource('organisation.users', ApiOrganisationUserController::class);

    Route::post('org-{organisation:slug}/users/{user}/detach', [ApiOrganisationUserController::class, 'detach'])
  ->name('organisation.users.detach');
});
