<?php

use App\Http\Controllers\Api\ApiProcessController;
use App\Http\Controllers\Api\ApiOrganisationController;
use App\Http\Controllers\Api\ApiOrganisationTagController;
use App\Http\Controllers\Api\ApiOrganisationUserController;
use App\Http\Controllers\Api\ApiOrganisationProcessController;
use App\Http\Controllers\Api\ApiOrganisationProcessGraphController;

Route::prefix('v1')->name('api.')->group(function () {
 
    // Route::get('/test/test', [TestController::class, 'test']);

    # Organisation
    Route::apiResource('organisation', ApiOrganisationController::class)->only(['show','update', 'index', 'destroy'])->scoped([
            'organisation' => 'slug'
          ]);

    # Process
    Route::apiResource('organisation.process', ApiOrganisationProcessController::class)->scoped([
    'organisation' => 'slug',
    'process' => 'id'
  ]);

    # Tag
    Route::apiResource('organisation.tag', ApiOrganisationTagController::class)->scoped([
        'organisation' => 'slug',
        'process' => 'id'
      ]);
    

    # OrganisationUser
    Route::apiResource('organisation.users', ApiOrganisationUserController::class)->scoped([
      'organisation' => 'slug',
      'process' => 'id',
    ])->names([
      'destroy' => 'organisation.users.detach',
      'create' => 'organisation.users.attach'
  ]);

    # OrganisationProcessGraph
    Route::apiResource('organisation.process.chart', ApiOrganisationProcessGraphController::class)->scoped([
      'organisation' => 'slug',
      'process' => 'id',
    ])->names([
      'data' => 'organisation.process.show'
  ]);
});
