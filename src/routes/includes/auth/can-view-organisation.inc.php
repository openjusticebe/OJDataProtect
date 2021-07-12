<?php

use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\OrganisationProcessController;
use App\Http\Controllers\OrganisationTagController;

Route::get('org-{org_slug}', [OrganisationController::class, 'show'])
->name('organisation.show');

Route::get('org-{org_slug}/process-{proc_id}', [OrganisationProcessController::class, 'show'])
->name('organisation.process.show');

Route::get('org-{org_slug}/tag-{tag_id}', [OrganisationTagController::class, 'show'])->name('organisation.tags.show');
