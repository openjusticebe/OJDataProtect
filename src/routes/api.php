<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['auth:api', 'verified']], function () {
Route::group(['middleware' => ['auth:api']], function () {
    require base_path('routes/includes/api/api-logged.php');

    Route::group(['middleware' => ['can:view-organisation,organisation'
  ],
], function () {
    require base_path('routes/includes/api/api-user-can-view-org.php');
});
});
