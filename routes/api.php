<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::resource('org-{org_slug}/process', 'Api\ApiProcessController')->only([
  'index', 'update', 'store', 'destroy'
]);

Route::get('org-{org_slug}/process/{process_id}', 'Api\ApiVisProcessController@data')->name('api.vis.network');



Route::resource('org-{org_slug}/tag', 'Api\ApiTagController')->only([
  'index', 'update', 'store', 'destroy'
]);
