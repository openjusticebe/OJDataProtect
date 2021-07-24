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
require base_path('routes/auth.php');
require base_path('routes/includes/public.php');

Route::group(['middleware' => 'auth'], function () {
    require base_path('routes/includes/auth/default.inc.php');
  
    Route::group(['middleware' => ['can:view-organisation,organisation']], function () {
        require base_path('routes/includes/auth/can-view-organisation.inc.php');
    });
});
