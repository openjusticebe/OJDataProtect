<?php

use App\Models\Organisation;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\OrganisationProcessController;
use App\Http\Controllers\OrganisationTagController;

// Organisation
Route::resource('organisation', OrganisationController::class)->only(['show'])->parameters([
  'organisation' => 'organisation:slug',
]);

Route::resource('organisation.process', OrganisationProcessController::class)->only(['show'])->parameters([
  'organisation' => 'organisation:slug',
  'process' => 'process:id',
]);


Route::resource('organisation.tag', OrganisationTagController::class)->only(['show'])->parameters([
  'organisation' => 'organisation:slug',
  'process' => 'process:id',
]);
