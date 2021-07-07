<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\OrganisationProcessController;
use App\Http\Controllers\OrganisationTagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])
    ->name('dashboard');
  
    Route::group(['middleware' => 'member'], function () {
        Route::get('org-{org_slug}', [OrganisationController::class, 'show'])
      ->name('organisation.show');
  
        Route::get('org-{org_slug}/process-{proc_id}', [OrganisationProcessController::class, 'show'])
      ->name('organisation.process.show');
  
        Route::get('org-{org_slug}/tag-{tag_id}', [OrganisationTagController::class, 'show'])->name('organisation.tags.show');
    });
});


require __DIR__.'/auth.php';
