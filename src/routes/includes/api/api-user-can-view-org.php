<?php

use App\Http\Controllers\Api\ApiProcessController;
use App\Http\Controllers\Api\ApiOrganisationController;
use App\Http\Controllers\Api\ApiOrganisationTagController;
use App\Http\Controllers\Api\ApiOrganisationUserController;
use App\Http\Controllers\Api\ApiOrganisationProcessController;
use App\Http\Controllers\Api\ApiOrganisationProcessGraphController;
use App\Http\Controllers\Api\ApiOrganisationResourcesController;

use App\Models\Organisation;
use App\Models\Process;

Route::prefix('v1')->name('api.')->group(function () {
 

    # Organisation
    Route::apiResource('organisation', ApiOrganisationController::class)->only(['show', 'update', 'index', 'destroy'])->scoped([
            'organisation' => 'slug'
          ]);


    Route::get('organisation/{organisation:slug}/api_resources_tags', [ApiOrganisationResourcesController::class, 'show'])->name('organisation.api_resources_tags');

          
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
    Route::get('organisation/{organisation:slug}/process/{process:id}/graph', [ApiOrganisationProcessGraphController::class, 'show'])->name('organisation.process.graph');
    // Route::apiResource('organisation.process_chart', ApiOrganisationProcessGraphController::class)->only(['show'])->scoped([
    //   'organisation' => 'slug',
    //   'process_chart' => 'id',
    // ]);
});
