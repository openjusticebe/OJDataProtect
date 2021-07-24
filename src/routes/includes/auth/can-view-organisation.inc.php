<?php

use App\Models\Organisation;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\OrganisationProcessController;
use App\Http\Controllers\OrganisationTagController;

// Organisation
Route::resource('organisation', OrganisationController::class)->only(['show'])->parameters([
  'organisation' => 'organisation:slug',
]);

// Route::get('/organisation/{organisation}', function (Organisation $organisation) {
//     return $organisation;
// })->name('organisation.show');

// Route::get('org-{organisation}', [OrganisationController::class, 'show'])
// ->name('organisation.show');

Route::get('org-{organisation}/process-{proc_id}', [OrganisationProcessController::class, 'show'])
->name('organisation.process.show');

Route::get('org-{organisation}/tag-{tag_id}', [OrganisationTagController::class, 'show'])->name('organisation.tags.show');
